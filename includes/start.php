<?php // start.php

// 데이터 선언
$head = '';
$message = '';
$header = '';
$nav = '';
$content = '';
$aside = '';
$footer = '';

// 헤드
$head_data = [
    'title' => "$INFO[title] : $INFO[subtitle]",
    'description' => "$INFO[description]",
];
$head = renderElement(TPL.'head.html', $head_data);

// 메시지
$message = printLog();

// 헤더
if ($USER) {
  $userLink = '<a href="?page=mypage">예매내역</a>';
  $loginLink = '<a href="?page=member&action=logout">로그아웃</a>';
} else {
  $userLink = '<a href="?page=member&action=register">회원가입</a>';
  $loginLink = '<a href="?page=member&action=login">로그인</a>';
}
$header_data = [
  'userLink' => $userLink,
  'loginLink' => $loginLink,
];
$header = renderElement(TPL.'header.html', $header_data);

// 푸터
$footer = file_get_contents('templates/footer.html');
