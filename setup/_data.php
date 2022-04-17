<?php // 데이터 입력

// DB 접속 
connectDB($DBCONF, false);

// 어드민 데이터
$conf = openJson('configs/admin.json');
$col = $conf['columns'];

// 어드민 데이터 존재 검사
$admin = getRecord($conf['table'], $col['id'][0], $col['id'][1]);

// 지우기
$clear = true;

// 테이블 컨피그
$tableConfig = openJson('configs/tables.json');
$prefix = $tableConfig['prefix'];

// 포스트 서브밋 처리
if (isset($_POST['confirm'])) {
  $clear = isset($_POST['clear']) ? true : false;
  $tables = [];
  foreach ($tableConfig['tables'] as $table) {
    $tableName = $prefix.'_'.$table;
    if ($_POST[$tableName] != '') {
      $tables[$table] = $tableName;
    }
  }

  if ($_POST['confirm']=='입력') {
    foreach ($tables as $key => $tableName) {
      $encrypt = ($tableName==$conf['table'])?$conf['columns']['pass'][0]: false;
      if ($clear) {
        clearData($tableName, false);
        // 어드민 데이터 존재시 재입력
        if ($tableName==$conf['table'] && $admin !== false) {
          insertData($tableName, $admin, true);
        }
      }
      insertDataAll($tableName, true, $encrypt);
    }
  } elseif ($_POST['confirm']=='테스트') {
    foreach ($tables as $key => $tableName) {
      checkData($tableName, true);
    }
  }
  $_SESSION['MSG'] = $MSG;
  header('Location: setup.php?action=data');
}

// 테이블 기본값
$tables = [];
foreach ($tableConfig['tables'] as $table) {
  $tableName = $prefix.'_'.$table;
  $fileName = $tableName.'.json';
  $tables[$tableName] = file_exists('data/'.$fileName)?$fileName:'';
}

$checked = $clear ? 'checked' : '';
$tableInputs = '';
foreach ($tables as $tableName => $fileName) {
  $tableInputs .= "<tr><td>$tableName</td><td>";
  $tableInputs .= "<input type=\"text\" name=\"$tableName\" value=\"$fileName\" readonly>";
  $tableInputs .= "</td></tr>";
}

$content .= "
  <section class='setup'>
    <div class='title'>데이터 입력</div>
    <form method='post' action=''>
      <table>
        $tableInputs
      </table>
      <div class='buttons'>
        <label><input type='checkbox' name='clear' $checked>클리어</label>
        <input class='btn' type='submit' name='confirm' value='입력'>
        <input class='btn' type='submit' name='confirm' value='테스트'>
      </div>
    </form>
  </section>
";