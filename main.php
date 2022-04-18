<?php // main.php
// 초기화
require_once 'includes/init.php';
require_once 'includes/start.php';

// 사이트 로직
switch ($PAGE) {
    case 'top':
        $content = PAGE.'top.php';
        break;

    case 'movie':
        $INFO['subtitle'] = '영화';
        $content = PAGE.'movie.php';
        break;

    default:
    if ($USER) {
        switch ($PAGE) {
            case 'ticket':
                $INFO['subtitle'] = '좌석선택';
                $content = PAGE.'ticket.php';
                break;
            
            case 'mypage':
                $INFO['subtitle'] = '예매내역';
                $content = PAGE.'mypage.php';
                break;
    
            case 'logout':
                logout();
                break;
    
            default:
                header('Location: main.php?page=mypage');
            
        }
    } else {
        switch ($PAGE) {
            case 'login':
                $INFO['subtitle'] = '로그인';
                $content = PAGE.'login.php';
                break;
    
            case 'register':
                $INFO['subtitle'] = '회원가입';
                $content = PAGE.'register.php';
                break;
    
            default:
                $INFO['subtitle'] = '로그인';
                pushLog('로그인 후 이용해주세요.');
                $content = PAGE.'login.php';
                break;
        }
        
    }
}

// 헤드
$head_data = [
    'title' => "$INFO[title] : $INFO[subtitle]",
    'description' => "$INFO[description]",
];
$head = renderElement(TPL.'head.html', $head_data);

// 인클루드
include_once $content;
