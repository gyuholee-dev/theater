<?php // 처음 설정
// 초기화
require_once 'setup/init.php';

// 변수 선언
$nav = ''; // 메뉴
$message = ''; // 메시지
$content = ''; // 컨텐츠

// 컨텐츠
// 액션 리퀘스트 값에 따라 각각 다른 페이지를 인클루드한다.
if (!$USER) {
  // 로그인
  $ACT = 'login';
  include 'setup/_login.php';
} else {
  switch ($ACT) {  
    // 데이터베이스 설정
    case 'db':
      include 'setup/_db.php';
      break;
  
    // 테이블 생성
    case 'table':
      include 'setup/_table.php';
      break;

    // 관리자 계정
    case 'admin':
      include 'setup/_admin.php';
      break;
  
    // 데이터 입력
    // case 'data':
    //   include 'setup/_data.php';
    //   break;
    
    default:
      header('Location: setup.php?action=db');
  }
}

// 메시지
$message = printLog();

// 메뉴
if ($USER && $ACT != 'login') {
  $active = ['db'=>'','table'=>'','admin'=>'','data'=>''];
  $active[$ACT] = 'active';
  $disabled = checkDB($DBCONF) ? '' : 'disabled';
  $nav = <<<HTML
    <ul>
      <li class="$active[db]">
        <a href="setup.php?action=db">MariaDB 설정</a>
      </li>
      <li class="$active[table] $disabled">
        <a href="setup.php?action=table">테이블 생성</a>
      </li>
      <li class="$active[admin] $disabled">
        <a href="setup.php?action=admin">관리자 계정</a>
      </li>
      <li class="$active[data] disabled">
        <a href="setup.php?action=data">데이터 입력</a>
      </li>
      <li class="$disabled">
        <a href="main.php">사이트 메인</a>
      </li>
    </ul>
  HTML;
}

//------------------------ 랜더링 ------------------------

// 템플릿에 전달할 변수
$content_values = array( 
  '{action}' => $ACT,
  '{nav}' => $nav,
  '{message}' => $message,
  '{content}' => $content,
);

// 템플릿 로드 및 랜더링
$html = file_get_contents('setup/template.html');
$html = strtr($html, $content_values);
echo $html;
