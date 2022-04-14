<?php // DB 검사 및 생성

// 포스트 서브밋 처리
if (isset($_POST['confirm'])) {
  $DBCONF['host'] = $_POST['host'];
  $DBCONF['user'] = $_POST['user'];
  $DBCONF['pass'] = $_POST['pass'];
  $DBCONF['database'] = $_POST['database'];

  if ($_POST['confirm']=='DB생성') { // DB생성
    createDB($DBCONF);
    makeDBConfig($DBCONF, false);
  } elseif ($_POST['confirm']=='테스트') { // 테스트
    checkDB($DBCONF, true);
  } elseif ($_POST['confirm']=='설정저장') { // 설정파일 저장
    makeDBConfig($DBCONF, true);
  }
  $_SESSION['MSG'] = $MSG;
  header('Location: setup.php?action=db');
}

// host, user 조건에 따라 사용자 db 이름 및 생성을 readonly 처리
$readonly = '';
$disabled = '';
if ($_SERVER['HTTP_HOST'] != 'localhost' || $DBCONF['user'] != 'root') {
  $readonly = 'readonly';
  $disabled = 'disabled';
}

$content .= <<<HTML
  <section class="setup">
    <div class="title">MariaDB 설정</div>
    <form method="post" action="">
      <table>
        <tr>
          <td>호스트</td>
          <td><input type="text" name="host" value="$DBCONF[host]" readonly required></td>
        </tr>
        <tr>
          <td>사용자</td>
          <td><input type="text" name="user" value="$DBCONF[user]" required></td>
        </tr>
        <tr>
          <td>비밀번호</td>
          <td><input type="password" name="pass" value="$DBCONF[pass]"></td>
        </tr>
        <tr>
          <td>DB 이름</td>
          <td><input type="text" name="database" value="$DBCONF[database]" required $readonly></td>
        </tr>
      </table>
      <div class="buttons">
        <input class="btn" type="submit" name="confirm" value="DB생성" $disabled>
        <input class="btn" type="submit" name="confirm" value="테스트">
        <input class="btn" type="submit" name="confirm" value="설정저장">
      </div>
    </form>
  </section>
HTML;