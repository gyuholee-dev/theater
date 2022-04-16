<?php // 사이트 메인으로 이동

// 로그아웃
session_destroy();
setcookie('key', '', time()-60);

// 이동
header('Location: main.php');