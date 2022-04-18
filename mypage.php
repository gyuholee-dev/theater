<?php
require_once 'includes/init.php';
require_once 'includes/start.php';

// 유저 데이터 조회
$sql = "SELECT * FROM theater_member 
        WHERE userid = '$USER[userid]' ";
$res = mysqli_query($DB, $sql);
$userData = mysqli_fetch_assoc($res);
$userId = $userData['userid'];
$myPoints = $userData['points'];

// 서브밋 처리
if (isset($_POST['confirm'])) {
    $ticketnum = $_POST['ticketnum'];

    // 티켓 조회
    $sql = "SELECT * FROM theater_ticket 
            WHERE ticketnum = '$ticketnum' ";
    $res = mysqli_query($DB, $sql);
    $ticketData = mysqli_fetch_assoc($res);

    // 좌석 업데이트
    $scrncode = $ticketData['scrncode'];
    $seatNum = 'seat_'.$ticketData['seatnum'];
    $sql = "UPDATE theater_screen 
            SET $seatNum = null 
            WHERE scrncode = '$scrncode' ";
    mysqli_query($DB, $sql);

    // 포인트 취소
    $payment = $ticketData['payment'];
    $sql = "UPDATE theater_member 
            SET points = points + $payment 
            WHERE userid = '$userId' ";
    mysqli_query($DB, $sql);

    // 티켓 삭제
    $sql = "DELETE FROM theater_ticket 
            WHERE ticketnum = '$ticketnum' ";
    mysqli_query($DB, $sql);

    alert('티켓 예약이 취소되었습니다.', 'mypage.php');
}

// 티켓 조회
$sql = "SELECT ticket.*,
movie.firmtitle AS firmtitle,
movie.topimg AS topimg,
movie.summary AS summary,
screen.scrnstart AS scrnstart,
screen.scrnend AS scrnend
FROM theater_ticket AS ticket
JOIN theater_movie AS movie ON ticket.firmcode = movie.firmcode
JOIN theater_screen AS screen ON ticket.scrncode = screen.scrncode 
WHERE ticket.userid = '$userId' 
ORDER BY ticket.ticketnum DESC";
$res = mysqli_query($DB, $sql);

?>
<!-- HTML START -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <?=$head?>
    <link rel="stylesheet" href="styles/mypage.css">
</head>
<body>
    <header>
        <?=$header?>
        <script>
            function checkCancel(form) {
                if (confirm("티켓 예약을 취소하시겠습니까?")) {
                    form.submit()
                } else { 
                    return false;
                }
            }
        </script>
    </header>
    <main>
        <section id="userdata">
            <div class="title">결제정보</div>
            <div class="content">
                <div class="wrap">
                    <div class="info">
                        <div class="title">회원정보</div>
                        <div class="data">
                            <p>아이디: <?=$userData['userid']?></p>
                            <p>닉네임: <?=$userData['nickname']?></p>
                            <p>이메일: <?=$userData['email']?></p>
                            <p>전화번호: <?=$userData['phone']?></p>
                        </div>
                    </div>
                    <div class="payment">
                        <div class="title">결제수단</div>
                        <div class="data">
                            <p>신용카드: 미등록</p>
                            <p>포인트: <?=number_format($myPoints).'원';?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="purchased">
            <div class="title">결제내역</div>
            <div class="content">
            <?php
                $formIndex = 0;
                $html = '';
                while ($data = mysqli_fetch_assoc($res)) {
                    $formIndex++;
                    $formName = 'form'.numStr($formIndex,2);

                    $codes = decode_scrncode($data['scrncode']);
                    $screenInfo = $codes['scrndate'].', '.
                        $codes['scrnnum'].'관 '.$codes['scrncnt'].'회차, '.
                        $data['scrnstart'].' ~ '.$data['scrnend'].', 좌석: '.$data['seatnum'];

                    $paydate = date('Y-m-d H:i:s', $data['paydate']);
                    $payment = number_format($data['payment']).'원';

                    $html .= "
                        <div class='ticket'>
                            <div class='topimg'>
                                <img src='$data[topimg]'>
                            </div>
                            <div class='info'>
                                <div class='title'>$data[firmtitle]</div>
                                <div class='summary'>$data[summary]</div>
                                <div class='screen'>
                                    $screenInfo
                                </div>
                            </div>
                            <div class='payment'>
                                <div class='date'>$paydate</div>
                                <div class='points'>$payment</div>
                                <form name='$formName' method='post'>
                                    <input type='hidden' name='ticketnum' value='$data[ticketnum]'>
                                    <input type='hidden' name='confirm' value='예약취소'>
                                    <input type='button' value='예약취소' onclick='checkCancel($formName)'>
                                </form>
                            </div>
                        </div>
                    ";
                }
                echo $html;
            ?>
            </div>
        </section> 
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>