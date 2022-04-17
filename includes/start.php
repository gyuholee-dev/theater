<?php // start.php

// 데이터 선언
$head = '';
$message = '';
$header = '';
$nav = '';
$content = '';
$aside = '';
$footer = '';

// main.php 이외 파일을 로드할 경우
if (basename($_SERVER['PHP_SELF']) != 'main.php') {
    // 헤드
    $head_data = [
        'title' => "$INFO[title] : $INFO[subtitle]",
        'description' => "$INFO[description]",
    ];
    $head = renderElement(TPL.'head.html', $head_data);
}

// 헤더
if ($USER) {
  $userLink = '<a href="main.php?page=mypage">예매내역</a>';
  $loginLink = '<a href="main.php?page=logout">로그아웃</a>';
} else {
  $userLink = '<a href="main.php?page=register">회원가입</a>';
  $loginLink = '<a href="main.php?page=login">로그인</a>';
}
$header_data = [
  'userLink' => $userLink,
  'loginLink' => $loginLink,
];
$header = renderElement(TPL.'header.html', $header_data);

// 푸터
$footer = file_get_contents(TPL.'footer.html');
