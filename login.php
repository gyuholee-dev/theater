<?php
require_once 'includes/init.php';
require_once 'includes/start.php';

$INFO['subtitle'] = '로그인';

// 로그인 처리
if (isset($_POST['confirm'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
  
    $sql = "SELECT * FROM theater_member WHERE userid='$userid'";
  
    try {
        $result = mysqli_query($DB, $sql);
        $userData = mysqli_fetch_assoc($result);
  
        if (isset($userData['password']) && $userData['password'] == AES_ENCRYPT($password, $password)) {
            setUserData($userData);
            header('Location: main.php');
        } else {
            pushLog('로그인 실패: 비밀번호를 확인해 주세요', 'error');
            $_SESSION['MSG'] = $MSG;
            header('Location: main.php?page=login');
        }
    } catch (Exception $e) {
        pushLog('로그인 오류: '.$e->getMessage(), 'error');
        $_SESSION['MSG'] = $MSG;
        header('Location: main.php?page=login');
    }
}

?>
<!-- HTML START -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <?=$head?>
</head>
<body>
    <header>
        <?=$header?>
        <link rel="stylesheet" href="styles/member.css">
    </header>
    <main>
        <section id="member">
            <div id="inputbox" class="$ACT">
                <div class="title">로그인</div>
                <form method="post" action="">
                    <table>
                        <tr>
                            <td>사용자</td>
                            <td><input type="text" name="userid" value="" required></td>
                        </tr>
                        <tr>
                            <td>비밀번호</td>
                            <td><input type="password" name="password" value="" required></td>
                        </tr>
                    </table>
                    <div class="buttons">
                        <input class="btn" type="submit" name="confirm" value="로그인">
                        <input class="btn" type="button" value="회원가입"
                            onclick="location.href='main.php?page=register'">
                    </div>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <?=$footer?>
    </footer>
</body>

</html>