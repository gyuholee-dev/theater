<?php // init.php
// 초기화 ------------------------------------------------
require_once 'includes/functions.php';
require_once 'includes/elements.php';
ini_set('display_errors', 'On');
ini_set('session.use_strict_mode', 0);
mysqli_report(MYSQLI_REPORT_ALL);
session_start();

// 패스 상수 선언
// define('ROOT', '/'.basename(getcwd()).'/');
define('INC', 'includes/');
define('CONF', 'configs/');
define('DATA', 'data/');
define('FILE', 'files/');
define('PAGE', 'pages/');
define('IMG', 'images/');
define('STL', 'styles/');
define('SCT', 'scripts/');
define('TPL', 'templates/');

//글로벌 변수
global $MSG;
global $INFO;
global $CONF;
global $USER;
global $DB;
global $DBCONF;
global $PAGE;
global $ACT;

/* 리퀘스트
page: top, about, tour, contact, etc...
action 액션: list, item...
*/
$PAGE = isset($_REQUEST['page'])?$_REQUEST['page']:'top';
$ACT = isset($_REQUEST['action'])?$_REQUEST['action']:'list';

// 메시지
if (isset($_SESSION['MSG'])) {
    $MSG = $_SESSION['MSG'];
    unset($_SESSION['MSG']);
} else {
    $MSG = [
        'info' => '',
        'success' => '',
        'error' => ''
    ];
}

// DB 초기화 ------------------------------------------------

// 설정파일 로드
$INFO = openJson(CONF.'info.json');
$CONF = openJson(CONF.'config.json');

// DB 설정파일 로드
if ($_SERVER['HTTP_HOST']=='localhost') {
    $dbConfigFile = 'db.localhost.json';
} else {
    $dbConfigFile = 'db.cafe24.json';
}

// DB설정 체크, 접속, 테이블 검사
$dbLog = '';
$DBCONF = openJson(CONF.$dbConfigFile);
if (!$DBCONF) {
    $dbLog = 'DB 설정파일이 존재하지 않습니다.';
} else {
    $DB = connectDB($DBCONF);
    if (!$DB) {
        $dbLog = 'DB 접속에 실패하였습니다.';
    } else {
        $fileList = glob(DATA.'travel_*.sql');
        foreach ($fileList as $file) {
            $table = str_replace('.sql', '', basename($file));
            if (!checkTable($table)) {
                $dbLog = '테이블이 존재하지 않습니다.';
                $DB = disconnectDB($DB);
                break;
            }
        }
    }
}
if ($dbLog) {
    pushLog($dbLog.' 셋업을 실행해 주세요. [<a href="setup.php">바로가기</a>]', 'error');
}
unset($dbConfigFile, $dbLog);

// 유저 초기화 ------------------------------------------------

// 로그인 체크
if (isset($_SESSION['USER']) && isset($_COOKIE['USER'])) {
    // 세션 유저 키와 쿠키 유저 키를 비교하여 같을 경우에 로그인 인정
    if ($_SESSION['USER']['key'] == json_decode($_COOKIE['USER'], true)['key']) {
        $USER = $_SESSION['USER'];
    }
}
if (!$USER) { // 로그인 안되어 있을 경우
    if (isset($_SESSION['USER'])) {
        unset($_SESSION['USER']);
    }
    setcookie('USER', '', time()-3600);
}
