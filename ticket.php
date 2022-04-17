<?php
require_once 'includes/init.php';
require_once 'includes/start.php';

// 임시 변수
$scrnday = '2022-04-23';
$scrnnum = '01';
$scrncnt = '01';
$firmcode = '20192206D';

// 리퀘스트
$scrnday = (isset($_REQUEST['scrnday']))?$_REQUEST['scrnday']:$scrnday;
$scrnnum = (isset($_REQUEST['scrnnum']))?$_REQUEST['scrnnum']:$scrnnum;
$scrncnt = (isset($_REQUEST['scrncnt']))?$_REQUEST['scrncnt']:$scrncnt;
$firmcode = (isset($_REQUEST['firmcode']))?$_REQUEST['firmcode']:$firmcode;

// 스크린 데이터 조회
$sql = "SELECT * FROM theater_screen 
        WHERE 
        scrnday = '$scrnday' AND 
        scrnnum = '$scrnnum' AND 
        scrncnt = '$scrncnt' ";
$res = mysqli_query($DB, $sql);
$scrnData = mysqli_fetch_assoc($res);
$scrnInfo = $scrnData['scrnday'].', '.
    $scrnData['scrnnum'].'관 '.$scrnData['scrncnt'].'회차, '.
    $scrnData['scrnstart'].' ~ '.$scrnData['scrnend'];
$prices = [
    'a' => $scrnData['price_a'],
    'b' => $scrnData['price_b'],
    'c' => $scrnData['price_c'],
    'd' => $scrnData['price_d'],
    'e' => $scrnData['price_e'],
];

// 영화 데이터 조회
$sql = "SELECT * FROM theater_movie 
        WHERE firmcode = '$firmcode' ";
$res = mysqli_query($DB, $sql);
$movieData = mysqli_fetch_assoc($res);
$movieInfo = $movieData['firmtitle'].' | '.$movieData['summary'];

// 내 포인트 조회
$sql = "SELECT * FROM theater_member 
        WHERE userid = '$USER[userid]' ";
$res = mysqli_query($DB, $sql);
$userData = mysqli_fetch_assoc($res);
$userId = $userData['userid'];
$myPoints = $userData['points'];


// 서브밋 처리
if (isset($_POST['confirm'])) {
    $cart = json_decode($_POST['cart']);
    $scrnday = $_POST['scrnday'];
    $scrnnum = $_POST['scrnnum'];
    $scrncnt = $_POST['scrncnt'];
    $firmcode = $_POST['firmcode'];

    $scrNum = $scrnnum.$scrncnt;
    $dayNum = date('md',strtotime($scrnday));
    
    // 넘버 기본값
    $num = 1023011;
    // 티켓 레코드에서 마지막 데이터의 넘버를 가져온다
    $sql = "SELECT MAX(ticketnum) FROM theater_ticket ";
    $lastTicketNum = mysqli_fetch_row(mysqli_query($DB, $sql))[0];
    if ($lastTicketNum) {
        $nums = explode('-', $lastTicketNum);
        $num = (int)($nums[2].$nums[3]);
    }

    foreach ($cart as $seatnum) {
        $num += rand(128, 1024);
        $num = numStr($num, 7);
        $ticketNum = substr($num, 0, 4).'-'.substr($num, 4, 3);
        $ticketNum = $scrNum.'-'.$dayNum.'-'.$ticketNum;
        $price = $prices[substr($seatnum, 0, 1)];

        // 티켓 등록
        $sql = "INSERT INTO theater_ticket
        (ticketnum, scrnnum, scrncnt, firmcode, seatnum, userid, payment)
        VALUES
        ('$ticketNum', '$scrnnum', '$scrncnt', '$firmcode', '$seatnum', '$userId', $price)";
        mysqli_query($DB, $sql);

        // 포인트 차감
        $sql = "UPDATE theater_member 
                SET points = points - $price 
                WHERE userid = '$userId' ";
        mysqli_query($DB, $sql);

        // 좌석 등록
        $sql = "UPDATE theater_screen 
                SET seat_$seatnum = '$ticketNum' 
                WHERE 
                scrnday = '$scrnday' AND 
                scrnnum = '$scrnnum' AND 
                scrncnt = '$scrncnt' ";
        mysqli_query($DB, $sql);

    }
    alert('예매가 완료되었습니다.', 'main.php');

}


?>
<!-- HTML START -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <?=$head?>
    <link rel="stylesheet" href="styles/ticket.css">
    <script>
        var prices = <?=json_encode($prices)?>;
        var checked = [];

        function selectSeat(button) {
            var payment = document.payment;
            // console.log(button);
            var $button = $(button);
            if ($button.hasClass('disabled')) {
                return false;
            }
            if ($button.hasClass('selected')) {
                $button.removeClass('selected');
                checked.splice(checked.indexOf(button.value), 1);
            } else {
                $button.addClass('selected');
                checked.push(button.value);
            }

            var price = checked.length * Number(prices[button.value.substr(0, 1)]);
            if (price>0) {
                payment.check.disabled = false;
            } else {
                payment.check.disabled = 'disabled';
            }

            payment.cart.value = JSON.stringify(checked);
            $('#result .seats')[0].innerText = checked.join(', ');
            $('#result .price')[0].innerHTML = price + '원';
        }

        function checkPay() {
            if (confirm("결제하시겠습니까?")) {
                document.payment.submit()
            } else { 
                return false;
            }
        }

    </script>
</head>
<body>
    <header>
        <?=$header?>
    </header>
    <main>
        <section id="screen">
            <div class="title">좌석선택</div>
            <div class="content">
                <div class="screen">screen</div>
                <div class="seats">
                <?php
                    $rows = ['a', 'b', 'c', 'd', 'e'];
                    foreach ($rows as $val) {
                        echo '<div class="select '.strtoupper($val).'">';
                        for ($i=0; $i < 10; $i++) { 
                            $num = $val.numStr($i+1, 2);
                            $calName = 'seat_'.$num;
                            $class = $scrnData[$calName]?'disabled':'';
                            echo "
                                <input type='button' class='check $class' 
                                value='$num' onclick='selectSeat(this)'>
                            ";
                        }
                        echo '</div>';
                    }
                ?>
                </div>
            </div>
        </section>
        <section id="result">
            <div class="ticket">
                <div class="box title">티켓</div>
                <div class="box">
                    <?=$movieInfo?>
                </div>
                <div class="box">
                    <div><?=$scrnInfo?></div>
                    <span>좌석: </span>
                    <span class="seats"></span>
                </div>
            </div>
            <!-- <form class="payment" name="payment" method="post" action="main.php?page=pay"> -->
            <!-- 일단 현재 페이지에서 즉시 결제 처리 -->
            <form class="payment" name="payment" method="post">
                <div class="title">내 포인트</div>
                <div class="points"><?=$myPoints?>원</div>
                <div class="title">결제금액</div>
                <div class="price">0원</div>
                <input type="hidden" name="cart" value="">
                <input type="hidden" name="scrnday" value="<?=$scrnData['scrnday']?>">
                <input type="hidden" name="scrnnum" value="<?=$scrnData['scrnnum']?>">
                <input type="hidden" name="scrncnt" value="<?=$scrnData['scrncnt']?>">
                <input type="hidden" name="firmcode" value="<?=$scrnData['firmcode']?>">
                <input type="hidden" name="confirm" value="결제">
                <input type="button" name="check" value="결제" disabled="disabled" onclick="checkPay()">
            </form>
        </section>
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>