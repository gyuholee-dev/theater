<?php // main.php
// 초기화
require_once 'includes/init.php';
require_once 'includes/start.php';

// 페이지 인클루드 및 이동
switch ($PAGE) {
    case 'top':
        $content = PAGE.'top.php';
        break;

    case 'movie':
        $content = PAGE.'movie.php';
        break;

    case 'ticket':
        if ($USER) {
            $content = PAGE.'ticket.php';
        } else {
            pushLog('로그인 후 이용해주세요.');
            $content = PAGE.'login.php';
        }
        break;

    case 'login':
        $content = PAGE.'login.php';
        break;

    case 'logout':
        logout();
        break;

    case 'register':
        $content = PAGE.'register.php';
        break;

    case 'mypage':
        $content = PAGE.'mypage.php';
        break;

    default:
        header('Location: main.php');
        break;
}

// 헤드
$head_data = [
    'title' => "$INFO[title] : $INFO[subtitle]",
    'description' => "$INFO[description]",
];
$head = renderElement(TPL.'head.html', $head_data);

// 인클루드
include_once $content;
