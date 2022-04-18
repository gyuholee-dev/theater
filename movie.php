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
        <section>
            <div class="content1">
                <div class="contitle"></div>
                <div class="conbox">
                    <div class="box">
                        <a href="movie.php">
                            <div class="conimg">
                                <img src="images/movie/Baekdusan/poster2.jpg" alt="Baekdusan">
                            </div>
                        </a>    
                    </div>
                    <div class="box_info">
                        <div class="m_title">백두산 [예매중]</div>
                        <div class="m_text">
                            <p>감독 : 이해준 ,  김병서 / 프로듀서 : 최지선 ,  최원기</p><br>
                            <p>배우 : 이병헌 ,  하정우 ,  마동석 ,  전혜진 ,  배수지</p><br>
                            <p>장르 : 액션, 드라마 </p><br>
                            <p>기본 : 12세 이상, 128분, 한국</p><br>
                            <p>개봉 : 2019.12.19</p>
                        </div>
                        <a href="ticket.php">
                            <div class="m_ticket">예매하기</div>
                        </a>    
                    </div>
                </div>
            </div><!-- content1 end-->

            <div class="content2">
                <div class="box_story">
                    <div class="m_title">줄거리</div>
                    <div class="m_text">
                        <p>대한민국 관측 역사상 최대 규모의 백두산 폭발 발생.</p><br>
                        <p>갑작스러운 재난에 한반도는 순식간에 아비규환이 되고,</p><br>
                        <p>남과 북 모두를 집어삼킬 추가 폭발이 예측된다.</p><br>
                        <p>사상 초유의 재난을 막기 위해 ‘전유경’(전혜진)은</p><br>
                        <p>백두산 폭발을 연구해 온 지질학 교수 ‘강봉래’(마동석)의 이론에 따른 작전을 계획하고,</p><br>
                        <p>전역을 앞둔 특전사 EOD 대위 ‘조인창’(하정우)이 남과 북의 운명이 걸린 비밀 작전에 투입된다.</p><br>
                        <p>작전의 키를 쥔 북한 무력부 소속 일급 자원 ‘리준평’(이병헌)과 접선에 성공한 ‘인창’.</p><br>
                        <p>하지만 ‘준평’은 속을 알 수 없는 행동으로 ‘인창’을 곤란하게 만든다.</p><br>
                        <p>한편, ‘인창’이 북한에서 펼쳐지는 작전에 투입된 사실도 모른 채 </p><br>
                        <p>서울에 홀로 남은 ‘최지영’(배수지)은 재난에 맞서 살아남기 위해 고군분투하고</p><br>
                        <p>그 사이,  백두산 마지막 폭발까지의 시간은 점점 가까워 가는데…!</p><br>
                
                    </div>
                </div>
            </div>

            <div class="content3">
                <div class="contitle">스틸컷</div>
                <div class="conbox">
                    <div class="box">
                        <img src="images/movie/Baekdusan/Baekdusan1.jpg" alt="Baekdusan">
                    </div>
                    <div class="box">
                        <img src="images/movie/Baekdusan/Baekdusan2.jpg" alt="Baekdusan">
                    </div>
                    <div class="box">
                        <img src="images/movie/Baekdusan/Baekdusan3.jpg" alt="Baekdusan">
                    </div>
                </div>
                <div class="conbox">
                <div class="box">
                        <img src="images/movie/Baekdusan/Baekdusan4.jpg" alt="Baekdusan">
                    </div>
                    <div class="box">
                        <img src="images/movie/Baekdusan/Baekdusan5.jpg" alt="Baekdusan">
                    </div>
                    <div class="box">
                        <img src="images/movie/Baekdusan/Baekdusan6.jpg" alt="Baekdusan">
                    </div>
                </div> 
            </div>
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>