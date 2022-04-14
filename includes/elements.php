<?php // elements.php

// 숫자를 자릿수 맞춰서 문자열로 변환
function numStr($numb, $numSize)
{
    $add = '0';
    for ($i=0; $i < $numSize; $i++) {
        $add = $add.'0';
    }
    $numb = $add.(string)$numb;
    $numb = substr($numb, 0-$numSize);
    return $numb;
}

// 엘리먼트 함수 ------------------------------------------------

// 템플릿을 로드하여 html 엘리먼트 생성
function renderElement($template, $data=array())
{
    $html = file_get_contents($template);
    foreach ($data as $key => $value) {
        $html = str_replace('{'.$key.'}', $value, $html);
    }
    return $html;
}

