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

    case 'ticket':
        include(PAGE.'ticket.php');
        break;

    case 'login':
        include(PAGE.'login.php');
        break;

    case 'logout':
        include(PAGE.'logout.php');
        break;

    case 'register':
        include(PAGE.'register.php');
        break;

    case 'mypage':
        include(PAGE.'mypage.php');
        break;

    default:
        header('Location: main.php');
        break;
}
