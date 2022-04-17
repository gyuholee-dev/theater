<?php
require_once 'includes/init.php';
require_once 'includes/start.php';
?>
<!-- HTML START -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <?=$head?>
    <link rel="stylesheet" href="styles/top.css">
</head>
<body>
    <header>
        <?=$header?>
    </header>
    <main>
        <section>
            <div class="content1">
                <div class="contitle">이번주 상영작</div>
                <div class="conbox">
                    <div class="box">
                        <a href="movie.php">
                            <div class="conimg">
                                <img src="images/movie/Baekdusan/poster2.jpg" alt="Baekdusan">
                            </div>
                            <div class="context">
                                <p>백두산</p>
                            </div>
                        </a>    
                    </div>
                    <div class="box">
                        <a href="movie.php">
                            <div class="conimg">
                                <img src="images/movie/parasite/poster2.jpg" alt="parasite">
                            </div>
                            <div class="context">
                                <p>기생충</p>
                            </div>
                        </a>    
                    </div>
                    <div class="box">
                        <a href="movie.php">
                            <div class="conimg">
                                <img src="images/movie/interstellar/poster2.jpg" alt="interstellar">
                            </div>
                            <div class="context">
                                <p>인터스텔라</p>
                            </div>
                        </a>    
                    </div>
                    <div class="box">
                        <a href="movie.php">
                            <div class="conimg">
                                <img src="images/movie/Titanic/poster1.jpg" alt="Titanic">
                            </div>
                            <div class="context">
                                <p>타이타닉</p>
                            </div>
                        </a>    
                    </div>
                </div>
            </div><!-- content1 end-->

            <div class="content2">
                <div class="conbox2">
                    <div class="box2">
                        <a href="guide.php">
                            <div class="conimg">
                                <img src="images/icon/guide.png" alt="guide">
                            </div>
                            <div class="context">
                                <p>이용안내</p>
                            </div>
                        </a>
                    </div>
                    
                    <div class="box2">
                        <a href="schedule.php">
                            <div class="conimg">
                                <img src="images/icon/schedule.png" alt="guide">
                            </div>
                            <div class="context">
                                <p>영화시간표</p>
                            </div>
                        </a>
                    </div>
                    <div class="box2">
                        <a href="culture.php">
                            <div class="conimg">
                                <img src="images/icon/culture.png" alt="guide">
                            </div>
                            <div class="context">
                                <p>문화예술</p>
                            </div>
                        </a>
                    </div>
                    <div class="box2">
                        <a href="notice.php">
                            <div class="conimg">
                                <img src="images/icon/notice.png" alt="guide">
                            </div>
                            <div class="context">
                                <p>공지사항</p>
                            </div>
                        </a>
                    </div>
                    <div class="box2">
                        <a href="location.php">
                            <div class="conimg">
                                <img src="images/icon/location.png" alt="guide">
                            </div>
                            <div class="context">
                                <p>오시는길</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div><!-- content2 end-->

            <div class="content3">
                <div class="conbox3">
                    <div class="box_content">
                        <div class="conimg">
                            <img src="images/contents/birthday.png" alt="guide">
                        </div>
                        <div class="context">
                            <p><b>[가족기능지원사업] 4월 생신잔치 진행</b></p>
                            <p>시민극장에서는 4월에 생일인 어르신댁에 방문하여 집에서 영화를 볼수 있는 나의 집 영화관 이벤트를 진행하였습니다...</p>
                        </div>
                    </div>

                    <div class="box_board">
                        <div class="conimg">
                            <img src="images/icon/communi.png" alt="guide">
                        </div>
                        <div class="context">
                            <p><b>소통마당</b></p><br>
                            [2022-04-18] 시민극장개관을 축하합니다.<br><br>
                            [2022-04-15] 교통편은 어떻게 되나요?<br><br>
                            [2022-04-15] 개관일은 언제인가요?<br><br>
                            [2022-04-14] 건의사항이 있습니다.<br><br>
                            [2022-04-14] 문화공연 일정은 어떻게 되...<br><br>
                            [2022-04-13] 영화예매 쉽게 하는 방법공유<br><br>
                            [2022-04-13] 카페는 언제부터 하나요?<br><br>
                            [2022-04-13] 5월에도 영화공연 하나요?<br><br>
                        </div>
                    </div>

                    <div class="box_cinema">
                        <div class="conimg">
                            <img src="images/icon/icon_schedule.png" alt="guide">
                        </div>
                        <div class="context">
                            <p><b>이달의 영화일정</b></p><br>
                            [2022-04-16] 백두산<br><br>
                            [2022-04-16] 기생충<br><br>
                            [2022-04-16] 인터스텔라<br><br>
                            [2022-04-16] 타이타닉<br><br>
                            [2022-04-23] 맨인블랙<br><br>
                            [2022-04-23] 벤허<br><br>
                            [2022-04-23] 미션임파서블<br><br>
                            [2022-04-23] 접속<br><br>
                        </div>
                    </div>
                </div>
            </div><!-- content3 end-->

            <div class="content4">
                <div class="conbox4">
                    <div class="box_links">
                        <a href="https://www.youtube.com" target="_blank">
                            <div class="conimg">
                                <img src="images/icon/youtube.png" alt="youtube">
                            </div>
                        </a>
                        <a href="https://www.facebook.com" target="_blank">
                            <div class="conimg">
                                <img src="images/icon/facebook.png" alt="facebook">
                            </div>
                        </a>
                        <a href="https://www.instagram.com" target="_blank">
                            <div class="conimg">
                                <img src="images/icon/instagram.png" alt="instagram">
                            </div>
                        </a>
                        <a href="https://www.kakaocorp.com/page/service/service/KakaoTalk" target="_blank">
                            <div class="conimg">
                                <img src="images/icon/kakao.png" alt="kakao">
                            </div>
                        </a>
                    </div>

                    <div class="box_links2">
                        <a href="http://www.ysnoin.or.kr/bbs/board.php?bo_table=0504" target="_blank">
                            <div class="conimg">
                                <img src="images/icon/voice.png" alt="ysnoin">
                            </div>
                        </a>
                        <a href="https://www.longtermcare.or.kr/npbs/r/a/104/selectMyBlog.web?ltcAdminSym=21117000016" target="_blank">
                            <div class="conimg">
                                <img src="images/icon/good.png" alt="good">
                            </div>
                        </a>
                        <!-- <a href="https://www.gov.kr/portal/main" target="_blank">
                            <div class="conimg_gov">
                                <img src="images/icon/gov24.png" alt="gov">
                            </div>
                        </a> -->
                    </div>

                    <div class="box_cafe">
                        <!-- <div class="conimg">
                            <img src="images/icon/icon_schedule.png" alt="guide">
                        </div> -->
                        <div class="context">
                            <img src="images/icon/coffee.png" alt="cafe">
                            <p><b>카페 메뉴</b></p><br>
                            1. 커피 [1,500원]<br><br>
                            2. 녹차   [1,500원]<br><br>
                            3. 과자   [1,000원] 
                        </div>
                    </div>


                </div>



            </div><!-- content4 end-->

            </div>


    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>