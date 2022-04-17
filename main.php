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
        $INFO['subtitle'] = '영화';
        $content = PAGE.'movie.php';
        break;

    case 'ticket':
        $INFO['subtitle'] = '좌석선택';
        if ($USER) {
            $content = PAGE.'ticket.php';
        } else {
            pushLog('로그인 후 이용해주세요.');
            $content = PAGE.'login.php';
        }
        break;

    case 'pay':
        $INFO['subtitle'] = '결제';
        if ($USER && $CART) {
            $content = PAGE.'pay.php';
        } else {
            pushLog('잘못된 접근입니다.');
            header('Location: main.php');
        }
        break;

    case 'login':
        $INFO['subtitle'] = '로그인';
        $content = PAGE.'login.php';
        break;

    case 'logout':
        logout();
        break;

    case 'register':
        $INFO['subtitle'] = '회원가입';
        $content = PAGE.'register.php';
        break;

    case 'mypage':
        $INFO['subtitle'] = '예매내역';
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
