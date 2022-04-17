<?php
require_once 'includes/init.php';
require_once 'includes/start.php';



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
        <section id="payment">
        <? 
            echo $_POST['cart'].'<br>';
            echo $_POST['price'].'<br>'; 
        ?>
        </section> 
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>