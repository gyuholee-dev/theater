<?php // main.php
// 초기화
require_once 'includes/init.php';
require_once 'includes/start.php';

// 페이지 인클루드 및 이동
switch ($PAGE) {
    case 'top':
        include(PAGE.'top.php');
        break;

    case 'movie':
        include(PAGE.'movie.php');
        break;

    default:
        header('Location: main.php');
        break;
}
