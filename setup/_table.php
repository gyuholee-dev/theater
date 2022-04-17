<?php // 테이블 검사 및 생성

// DB 접속 
connectDB($DBCONF, false);

// 드랍
$drop = true;

// 테이블 컨피그
$tableConfig = openJson('configs/tables.json');
$prefix = $tableConfig['prefix'];

// 포스트 서브밋 처리
if (isset($_POST['confirm'])) {
  $drop = isset($_POST['drop']) ? true : false;
  $tables = [];
  foreach ($tableConfig['tables'] as $table) {
    $tableName = $prefix.'_'.$table;
    if ($_POST[$tableName] != '') {
      $tables[$table] = $tableName;
    }
  }

  if ($_POST['confirm']=='생성') {
    foreach ($tables as $key => $tableName) {
      createTable($tableName, $drop, true);
    }
  } elseif ($_POST['confirm']=='테스트') {
    foreach ($tables as $key => $tableName) {
      checkTable($tableName, true);
    }
  }
  $_SESSION['MSG'] = $MSG;
  header('Location: setup.php?action=table');
}

// 테이블 기본값
$tables = [];
foreach ($tableConfig['tables'] as $table) {
  $tableName = $prefix.'_'.$table;
  $fileName = $tableName.'.sql';
  $tables[$tableName] = file_exists('data/'.$fileName)?$fileName:'';
}

$checked = $drop ? 'checked' : '';
$tableInputs = '';
foreach ($tables as $tableName => $fileName) {
  $tableInputs .= "<tr><td>$tableName</td><td>";
  $tableInputs .= "<input type=\"text\" name=\"$tableName\" value=\"$fileName\" readonly>";
  $tableInputs .= "</td></tr>";
}

$content .= "
  <section class='setup'>
    <div class='title'>테이블 생성</div>
    <form method='post' action=''>
      <table>
        $tableInputs
      </table>
      <div class='buttons'>
        <label><input type='checkbox' name='drop' $checked>드랍</label>
        <input class='btn' type='submit' name='confirm' value='생성'>
        <input class='btn' type='submit' name='confirm' value='테스트'>
      </div>
    </form>
  </section>
";