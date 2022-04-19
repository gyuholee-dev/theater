<?php
require_once 'includes/init.php';
require_once 'includes/start.php';

// 회원가입 처리
if (isset($_POST['confirm'])) {
    // $userid = $_POST['userid'];
    // $password = $_POST['password'];
    // $nickname = $_POST['nickname'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    // $address = $_POST['address'];
    // $avatar = $_POST['avatar'];

    // $sql = "INSERT INTO _member (userid, password, nickname, email, phone, address, avatar)
    //       VALUES('$userid', AES_ENCRYPT('$password', '$password'), '$nickname', '$email', '$phone', '$address', '$avatar')";
    // try {
    //     mysqli_query($DB, $sql);
    //     $userData = array(
    //         'userid' => $userid,
    //         'nickname' => $nickname,
    //         'groups' => 'user'
    //     );
    //     setUserData($userData);
    //     pushLog('회원가입 성공', 'success');
    // } catch (Exception $e) {
    //     pushLog('회원가입 실패: '.$e->getMessage(), 'error');
    // }
    // // $_SESSION['MSG'] = $MSG;
    // header('Location: main.php');
}

?>
<!-- HTML START -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <?=$head?>
    <script>
        // 아이디 체크
        async function checkId() {
            if (register.userid.value=='') {
                alert('아이디를 입력하세요');
                register.userid.focus();
                return false;
            }

            let check = await xhr(
                'checkId', { 
                    userid: register.userid.value
                }
            );
            
            if (check == 0) {
                alert('사용가능한 아이디입니다.');
                register.password.focus();
                register.idcheked.value=true;
            } else {
                alert('이미 사용중인 아이디입니다.');
                register.userid.value = '';
                register.userid.focus();
                return false;
            }
        }

        // 아이디 체크 리셋
        function resetCheck() {
            register.idcheked.value=false;
        }

        // 회원가입 폼 체크
        function sendRegister() {
            if (register.idcheked.value !== 'true') {
                alert('아이디 중복체크를 해주세요.');
                register.userid.focus();
                return false;
            }
            if (register.password.value !== register.password_check.value) {
                alert('비밀번호를 다시 확인해 주세요.');
                register.password.value = '';
                register.password_check.value = '';
                register.password.focus();
                return false;
            }
            if (register.agree.checked !== true) {
                alert('이용약관에 동의해 주세요.');
                return false;
            }
        
            // document.register.submit();
            register.confirm.click();
        }

    </script>
</head>
<body>
    <header>
        <?=$header?>
        <link rel="stylesheet" href="styles/member.css">
    </header>
    <main>
        <section id="member">
            <div id="inputbox" class="register">
                <div class="title">회원가입</div>
                <form name="register" method="post">
                    <table>
                        <tr>
                            <td>아이디</td>
                            <td>
                                <input type="text" name="userid" value="" required onchange="resetCheck()">
                                <input class="btn small" type="button" value="확인" onclick="checkId()">
                                <!-- quest: &#63; check: &#10003; cross: &#10007; -->
                            </td>
                        </tr>
                        <tr>
                            <td>비밀번호</td>
                            <td><input type="password" name="password" value="" required></td>
                        </tr>
                        <tr>
                            <td>비밀번호 확인</td>
                            <td><input type="password" name="password_check" value="" required></td>
                        </tr>

                        <tr>
                            <td class="label" colspan="2"><span>필수정보</span></td>
                        </tr>

                        <tr>
                            <td>이름</td>
                            <td><input type="text" name="nickname" value="" required></td>
                        </tr>
                        <tr>
                            <td>이메일</td>
                            <td><input type="email" name="email" value="" required></td>
                        </tr>

                        <tr>
                            <td class="label" colspan="2"><span>선택정보</span></td>
                        </tr>

                        <tr>
                            <td>전화번호</td>
                            <td><input type="text" name="phone" value=""></td>
                        </tr>
                        <tr>
                            <td>주소</td>
                            <td><input type="text" name="address" value=""></td>
                        </tr>
                        <tr>
                            <td>프로필 사진</td>
                            <td><input type="file" name="avatar" value=""></td>
                        </tr>
                    </table>
                    <div class="buttons">
                        <input type="hidden" name="idcheked" value="false">
                        <label><input type="checkbox" name="agree" value="off">약관동의</label>
                        <input class="hidden" type="submit" name="confirm" value="회원가입">
                        <input class="btn" type="button" value="회원가입" onclick="sendRegister()">
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