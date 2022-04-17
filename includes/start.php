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
$header = file_get_contents('templates/header.html');

// 푸터
$footer = file_get_contents('templates/footer.html');
