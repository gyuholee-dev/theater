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

// 스크린코드 생성
function encode_scrncode() {

}
// 스크린코드 해독
function decode_scrncode($scrncode='0000-0000-0000') {
    $codes = explode('-', $scrncode);
    return [
        $codes[0], $codes[1], $codes[2],
        'scrndate' => $codes[0].'-'.substr($codes[1], 0, 2).'-'.substr($codes[1], 2, 2),
        'scrnnum' => substr($codes[2], 0, 2),
        'scrncnt' => substr($codes[2], 2, 2),
    ];
}

// 티켓번호 생성
function encode_ticketnum($scrncode='0000-0000-0000', $num=0) {
    global $DB;
    $codes = decode_scrncode($scrncode);

    if ($num == 0) {
        // 넘버 기본값
        $num = 1023011;
        // 티켓 레코드에서 마지막 데이터의 넘버를 가져온다
        $sql = "SELECT MAX(ticketnum) FROM theater_ticket ";
        $lastTicketNum = mysqli_fetch_row(mysqli_query($DB, $sql))[0];
        if ($lastTicketNum) {
            $nums = explode('-', $lastTicketNum);
            $num = (int)($nums[2].$nums[3]);
        }
    }

    $num += rand(128, 1024); // 랜덤으로 증가
    $num = numStr($num, 7);
    $ticketNum = substr($num, 0, 4).'-'.substr($num, 4, 3);
    $ticketNum = $codes[0].'-'.$codes[1].'-'.$ticketNum;

    return $ticketNum;
}
// 티켓번호 해독
function decode_ticketnum() {
    
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

