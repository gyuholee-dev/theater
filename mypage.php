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
screen.scrnstart AS scrnstart,
screen.scrnend AS scrnend
FROM theater_ticket AS ticket
JOIN theater_movie AS movie ON ticket.firmcode = movie.firmcode
JOIN theater_screen AS screen ON ticket.firmcode = screen.firmcode 
AND ticket.scrnnum = screen.scrnnum AND ticket.scrncnt = screen.scrncnt
WHERE ticket.userid = '$userId' ";

?>
<!-- HTML START -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <?=$head?>
    <!-- css 추가 -->
    <!-- <link rel="stylesheet" href="styles/top.css"> -->
    <!-- js 추가 -->
    <!-- <script src="scripts/top.js"></script> -->
</head>
<body>
    <header>
        <?=$header?>
    </header>
    <main>
    <!-- 여기에 컨텐츠를 추가
        <section id="sectionId">
            <div class="class type">
                내용
            </div>
            ...
        </section> 
        ...
    -->
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>