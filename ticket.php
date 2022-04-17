<?php
require_once 'includes/init.php';
require_once 'includes/start.php';


// 스크린 데이터 조회
$sql = "SELECT * FROM theater_screen 
        WHERE scrnday = '2022-04-23' AND scrnnum = '01' ";
$res = mysqli_query($DB, $sql);
$scrnData = mysqli_fetch_assoc($res);
$scrnInfo = $scrnData['scrnday'].', '.
    $scrnData['scrnnum'].'관 '.$scrnData['scrncnt'].'회차, '.
    $scrnData['scrnstart'].' ~ '.$scrnData['scrnend'];

// 영화 데이터 조회
$sql = "SELECT * FROM theater_movie 
        WHERE firmcode = '20192206D' ";
$res = mysqli_query($DB, $sql);
$movieData = mysqli_fetch_assoc($res);
$movieInfo = $movieData['firmtitle'].' | '.$movieData['summary'];


?>
<!-- HTML START -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <?=$head?>
    <link rel="stylesheet" href="styles/ticket.css">
    <script>
        var checked = [];
        function check(button) {
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
            var price = checked.length*2000;
            if (price>0) {
                document.payment.confirm.disabled = false;
            } else {
                document.payment.confirm.disabled = 'disabled';
            }
            document.payment.cart.value = checked.join(',');
            document.payment.price.value = price;
            $('#result .seats')[0].innerText = checked.join(', ');
            $('#result .price')[0].innerHTML = price + '원';
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
                                value='$num' onclick='check(this)'>
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
            <form class="payment" name="payment" method="post" action="main.php?page=pay">
                <div class="title">결제금액</div>
                <div class="price">0원</div>
                <input type="hidden" name="cart" value="">
                <input type="hidden" name="price" value="">
                <input type="submit" name="confirm" value="결제" disabled="disabled">
            </form>
        </section>
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>