<?php
require_once 'includes/init.php';
require_once 'includes/start.php';

$sql = "SELECT * FROM theater_screen 
        WHERE scrnday = '2022-04-23' AND scrnnum = '01' ";
$res = mysqli_query($DB, $sql);
$scrnData = mysqli_fetch_assoc($res);

?>
<!-- HTML START -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <?=$head?>
    <link rel="stylesheet" href="styles/ticket.css">
    <script>
        var seats = [];
        function doSome(elem) {
            var elem = $(elem);
            console.log(elem[0].value);
            if (elem.hasClass('disabled')) {
                return false;
            }
            if (elem.hasClass('selected')) {
                elem.removeClass('selected');
                seats.splice(seats.indexOf(elem[0].value), 1);
            } else {
                elem.addClass('selected');
                seats.push(elem[0].value);
            }
            seats.length * 2000;
            document.querySelector('#payment>.result').innerHTML = seats.join(', ');
            document.querySelector('#payment>.price').innerHTML = seats.length * 2000;
            
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
            <?php
                $rows = ['a', 'b', 'c', 'd', 'e'];
                foreach ($rows as $val) {
                    echo '<div class="select '.strtoupper($val).'">';
                    for ($i=0; $i < 10; $i++) { 
                        $num = $val.numStr($i+1, 2);
                        $calName = 'seat_'.$num;
                        $class = $scrnData[$calName]?'disabled':'';
                        echo '<button class="check '.$class.'" value="'.$num.'" onclick="doSome(this)">'.strtoupper($num).'</button>';
                    }
                    echo '</div>';
                }
            ?>
            </div>
        </section>
        <section id="payment">
            <div class="result"></div>
            <div class="price">0</div>
        </section>
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>