<?php
require_once 'includes/init.php';
require_once 'includes/start.php';

// 내 포인트 조회
$sql = "SELECT * FROM theater_member 
        WHERE userid = '$USER[userid]' ";
$res = mysqli_query($DB, $sql);
$userData = mysqli_fetch_assoc($res);
$userId = $userData['userid'];
$myPoints = $userData['points'];

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
WHERE ticket.userid = '$userId' ";
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
    </header>
    <main>
        <section id="purchased">
            <div class="title">예약내역</div>
            <div class="content">
            <?php
                $html = '';
                while ($data = mysqli_fetch_assoc($res)) {

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
                                <input type='button' value='예약취소'>
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