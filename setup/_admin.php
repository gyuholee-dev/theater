<?php // 어드민 계정 생성

// DB 접속 
connectDB($DBCONF, false);

// 어드민 데이터
$conf = openJson('configs/admin.json');
$table = $conf['table'];
$col = $conf['columns'];

// 어드민 데이터가 존재하면 로드
$admin = getRecord($table, $col['id'][0], $col['id'][1]);
if ($admin !== false) {
  $col['id'][1] = $admin[$col['id'][0]];
  // $col['pass'][1] = $admin[$col['pass'][0]];
  $col['name'][1] = $admin[$col['name'][0]];
  $col['mail'][1] = $admin[$col['mail'][0]];
}

// 포스트 서브밋 처리
if (isset($_POST['confirm'])) {

  if ($_POST['confirm']=='입력') {
    // 어드민 아이디를 컨피그에 저장
    $conf['columns']['id'][1] = $_POST['id'];
    saveJson('configs/admin.json', $conf);

    $data = [];
    foreach ($col as $key => $value) {
      if ($key == 'id') {
        deleteData($table, $value[0], $_POST[$key]);
        $data[$value[0]] = $_POST[$key];
      } elseif ($key == 'pass') {
        $data[$value[0]] = AES_ENCRYPT($_POST[$key], $_POST[$key]);
      } else {
        $data[$value[0]] = $_POST[$key];
      }
    }
    insertData($table, $data, true);

    $_SESSION['MSG'] = $MSG;
    header('Location: setup.php?action=admin');

  } elseif ($_POST['confirm']=='테스트') {
    checkRecord($table, $col['id'][0], $_POST['id'], true);
    
    $_SESSION['MSG'] = $MSG;
    header('Location: setup.php?action=admin');

  }
  
}


$tableInputs = '';
foreach ($col as $key => $value) {
  $type = 'text';
  $type = ($key=='pass')?'password':$type;
  $type = ($key=='mail')?'email':$type;
  $readonly = ($key=='perm')?'readonly':'';
  $tableInputs .= "<tr><td>$value[0]</td><td>";
  $tableInputs .= "<input type=\"$type\" name=\"$key\" value=\"$value[1]\" $readonly>";
  $tableInputs .= "</td></tr>";
}

$content .= "
  <section class='setup'>
    <div class='title'>관리자 계정</div>
    <form method='post' action=''>
      <table>
        $tableInputs
      </table>
      <div class='buttons'>
        <input class='btn' type='submit' name='confirm' value='입력'>
        <input class='btn' type='submit' name='confirm' value='테스트'>
      </div>
    </form>
  </section>
";