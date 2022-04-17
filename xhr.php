<?php // xhr.php
require_once('includes/init.php');
// session_start();

// XHR 함수명 선언
$callFN = 'xhr_test';

// 함수 리퀘스트
if (isset($_GET['call'])) {
    $call = $_GET['call'];
} else {
    echo 'XHR_INVALID_ACCESS';
    exit();
}
$callFN = 'xhr_'.$call;

// 리퀘스트 들어온 함수를 실행한다
if (function_exists($callFN)) {
    $callFN();
} else {
    echo json_encode('XHR_CALL_UNKNOWN_FUNCTION: '.$callFN);
    exit();
}

// XHR 테스트함수
// echo 로 리턴
// 리턴값을 받아 console.log 로 출력해봄
function xhr_test() {
    echo json_encode($_GET);
}

// XHR 함수 ------------------------------------------------
// 보안 문제로 직접 function 에 억세스하지 않도록 함
// 설정파일 로드 함수를 만들 경우 지정된 파일명만 로드하도록 함

// XHR MSG
function xhr_getMsg() {
    global $MSG;
    if (isset($MSG)) {
        echo json_encode($MSG);
        unset($_SESSION['MSG']);
    }
}

// XHR 유저아이디 검사
function xhr_checkId() {
    echo checkId($_GET['userid']);
}
