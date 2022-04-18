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
                        <td colspan="5" align="center">
                           <h3>공지사항</h3>
                        </td>   
                    </tr>
                    <tr>
                        <td>번호</td>
                        <td>제목</td>
                        <td>글쓴이</td>
                        <td>날짜</td>
                        <td>조회</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>[이용안내] 회원가입 안내입니다.</td>
                        <td>관리자</td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>[셔틀버스안내] 셔틀버스 운행안내</td>
                        <td>관리자</td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>4월 주요 일정 안내(영화))</td>
                        <td>관리자</td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>4월 주요 일정 안내(공연)</td>
                        <td>관리자</td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>개관 기념 공연 안내</td>
                        <td>관리자</td>
                        <td>2022-04-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>[자원봉사자모집] 개관 기념 자원봉사자 모집합니다.</td>
                        <td>관리자</td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>[이용안내] 연간회원권 판매 시작합니다.</td>
                        <td>관리자</td>
                        <td>2022-04-14</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>온라인예매사이트 오픈기념 이벤트</td>
                        <td>관리자</td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>3월 주요 일정 안내(영화))</td>
                        <td>관리자</td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>3월 주요 일정 안내(공연)</td>
                        <td>관리자</td>
                        <td>2022-04-14</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>[안내] 사회적 거리두기 관련 대처요법</td>
                        <td>관리자</td>
                        <td>2022-04-14</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="center"></td>
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