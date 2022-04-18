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
            <div class="moviebox">
                <table class="theat">
                    <tr>
                        <td colspan="4" align="center"></td>
                           <h3>공지사항</h3>
                    </tr>
                    <tr>
                        <td>번호</td>
                        <td>제목</td>
                        <td>글쓴이</td>
                        <td>날짜</td>
                        <td>조회</td>
                    </tr>
                    <tr>
                        <td>공지</td>
                        <td>[이용안내] 회원가입 안내입니다.</td>
                        <td>[셔틀버스안내] 셔틀버스 운행 안내</td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>공지</td>
                        <td></td>
                        <td></td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>공지</td>
                        <td></td>
                        <td></td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>공지</td>
                        <td></td>
                        <td></td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>공지</td>
                        <td></td>
                        <td></td>
                        <td>2022-04-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>공지</td>
                        <td></td>
                        <td></td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>공지</td>
                        <td></td>
                        <td></td>
                        <td>2022-04-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>공지</td>
                        <td></td>
                        <td></td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>공지</td>
                        <td></td>
                        <td></td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>공지</td>
                        <td></td>
                        <td></td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>공지</td>
                        <td></td>
                        <td></td>
                        <td>2022-04-14</td>
                        <td>1</td>
                    </tr>
                </table>
            </div>
            
        </section>
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>
</html>