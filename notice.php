<?php
require_once 'includes/init.php';
require_once 'includes/start.php';
?>
<!-- HTML START -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <?=$head?>
    <link rel="stylesheet" href="styles/notice.css">
    <!-- js 추가 -->
    <!-- <script src="scripts/top.js"></script> -->
</head>
<body>
    <header>
        <?=$header?>
    </header>
    <main>
        <section>
            <nav class="tab_type1">
                <ul>
                    <li><a href="guide.php">이용안내</a></li>
                    <li><a href="schedule.php">영화시간표</a></li>
                    <li><a href="culture.php">문화예술</a></li>
                    <li><a href="notice.php">공지사항</a></li>
                    <li><a href="location.php">오시는길</a></li>
                </ul>
            </nav>

            
        </section>
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>