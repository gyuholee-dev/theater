<?php
require_once 'includes/init.php';
require_once 'includes/start.php';
?>
<!-- HTML START -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <?=$head?>
    <link rel="stylesheet" href="styles/movie.css">
    
</head>
<body>
    <header>
        <?=$header?>
    </header>
    <main>
        <section id="content">
            <div class="title">영화 제목
                <div class="post"></div>
            </div>
        </section>
        <section id="content">
            <div class="title">스틸컷
                <div class="post"></div>
            </div>
        </section>
        <section id="content">
            <div class="title">영화 줄거리
            </div>
        </section>
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>