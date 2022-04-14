<?php // 테이블 검사 및 생성

// DB 접속 
connectDB($DBCONF, false);

// 테이블 기본값
$prefix = 'travel_';
$drop = true;
$tables = [
  'item' => $prefix.'item',
  'member' => $prefix.'member',
  'booking' => $prefix.'booking',
  'board' => $prefix.'board',
];

// 포스트 서브밋 처리
if (isset($_POST['confirm'])) {
  $drop = isset($_POST['drop']) ? true : false;
  $tables = [
    'item' => $_POST['item'],
    'member' => $_POST['member'],
    'booking' => $_POST['booking'],
    'board' => $_POST['board'],
  ];

  if ($_POST['confirm']=='생성') { // DB생성
    foreach ($tables as $key => $table) {
      createTable($table, $drop, true);
    }
  } elseif ($_POST['confirm']=='테스트') { // 테스트
    foreach ($tables as $key => $table) {
      checkTable($table, true);
    }
  }
  $_SESSION['MSG'] = $MSG;
  header('Location: setup.php?action=table');
}

$checked = $drop ? 'checked' : '';

$content .= <<<HTML
  <section class="setup">
    <div class="title">테이블 생성</div>
    <form method="post" action="">
      <table>
        <tr>
          <td>상품</td>
          <td><input type="text" name="item" value="$tables[item]" readonly></td>
        </tr>
        <tr>
          <td>회원</td>
          <td><input type="text" name="member" value="$tables[member]" readonly></td>
        </tr>
        <tr>
          <td>주문</td>
          <td><input type="text" name="booking" value="$tables[booking]" readonly></td>
        </tr>
        <tr>
          <td>게시판</td>
          <td><input type="text" name="board" value="$tables[board]" readonly></td>
        </tr>
      </table>
      <div class="buttons">
        <label><input type="checkbox" name="drop" $checked>드랍</label>
        <input class="btn" type="submit" name="confirm" value="생성">
        <input class="btn" type="submit" name="confirm" value="테스트">
      </div>
    </form>
  </section>
HTML;