<?php
require_once 'setup/functions.php';
ini_set('display_errors', 'On');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
session_start();

// 글로벌 변수
global $USER;
global $ACT;
global $MSG;
global $DB;
global $DBCONF;

// 로그인 체크
if (isset($_SESSION['key'])) {
  if (isset($_COOKIE['key']) && $_SESSION['key'] == $_COOKIE['key']) {
    $USER = $_SESSION['key'];
    $ACT = 'db';
  } else {
    session_destroy();
    setcookie('key', '', time()-60);
    $ACT = 'login';
  }
}

// 액션
$ACT = isset($_GET['action'])?$_GET['action']:$ACT;

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

// DB 컨피그 기본값
$DBCONF = array();
if ($_SERVER['HTTP_HOST'] == 'localhost') { // 로컬호스트
  $DBCONF = openJson('configs/db.localhost.default.json');
} else { // cafe24
  $DBCONF = openJson('configs/db.cafe24.default.json');
}
// 설정파일 로드
if (fileExists('configs/'.$DBCONF['file'])) {
  $DBCONF = openJson('configs/'.$DBCONF['file']);
} else { // 존재하지 않을 경우 에러 메시지 출력
  if ($USER && $ACT != 'login') {
    pushLog('DB 설정파일을 생성해 주세요');
  }
}
