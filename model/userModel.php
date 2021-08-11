<?php
    include 'modules/mysql.php';
    include 'modules/mailer.php';
    session_start();
    function login() {
        $message = array();
        $email = $_POST['email'];
        $pw = $_POST['password'];

        if($email === "" || $pw === "") {
            $message['status'] = 'A400';
        } else {
            $encPw = hash('sha256', $pw);
            $sql = "select * from users where user_email='$email' and user_password='$encPw'";
            $users = mysqli_get_query($sql);
            if(count($users) == 1) {
                $user = $users[0];
                $_SESSION['alife_user_email'] = $user['user_email'];
                $_SESSION['alife_user_name'] = $user['user_name'];
                $_SESSION['alife_user_phone'] = $user['user_phone'];
                $_SESSION['alife_user_address'] = $user['user_address'];
                $_SESSION['alife_user_rank'] = $user['user_rank'];

                $message['status'] = 'A200';
            } else {
                $message['status'] = 'A404';
            }
        }

        echo json_encode($message);
    }

    function emailCheck() {
        $message = array();
        $email = $_POST['email'];
        if($email === "") {
            $message['status'] = 'A400';
        } else {
            $url = 'public/views/mail.html';
            $fp = fopen($url, 'r');
            $auth = rand(000000, 999999);
            $_SESSION['alife_auth'] = $auth;
            $content = fread($fp,filesize($url));
            $content = str_replace('{auth}', $auth, $content);

            $result = sendMail($email, $content);
            if($result) {
                $message['status'] = 'A200';
            } else {
                $message['status'] = 'A404';
            }
        }
        echo json_encode($message);
    }

    function emailAuthCheck() {
        $message = array();
        $certi = $_POST['certi'];
        if($certi == $_SESSION['alife_auth']) {
            $message['status'] = 'A200';
        } else {
            $message['status'] = 'A400';
        }
        unset($_SESSION['alife_auth']);
        echo json_encode($message);
    }

    function signUp() { 
        $message = array();
        $email = $_POST['email'];
        $pw = $_POST['password'];
        $name = $_POST['name'];
        $phone = $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'];
        $address = $_POST['address'];
        
        if($email === "" || $pw === "" || $name === "" || $_POST['phone1'] === "" || $_POST['phone2'] === "" || $_POST['phone3'] === "" || $address === "") {
            $message['status'] = 'A400';
        } else {
            $encPw = hash('sha256', $pw);
            $sql = "insert into users values('$email','$encPw','$name','$phone','$address',0,0)";
            if(mysqli_set_query($sql)) {
                $message['status'] = 'A200';
            } else {
                $message['status'] = 'A500';
            }
        }
        
        echo json_encode($message);
    }

    function doubleCheck() {
        $message = array();
        $email = $_POST['email'];

        $sql = "select * from users where user_email = '$email'";
        $users = mysqli_get_query($sql);
        if(count($users) == 1) {
            $message['status'] = 'A409';
        } else {
            $message['status'] = 'A200';
        }
        
        echo json_encode($message);
    }

    function findEmail() {
        $message = array();
        $name = $_POST['name'];
        $phone = $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'];

        if($name === '' || $_POST['phone1'] === '' || $_POST['phone2'] === '' || $_POST['phone3'] === '') {
            $message['status'] = 'A400';
        } else {
            $sql = "select * from users where user_name = '$name' and user_phone = '$phone'";
            $users = mysqli_get_query($sql);
            if(count($users) > 0) {
                $message['status'] = 'A200';
                $message['email'] = $users[0]['user_email'];
            } else {
                $message['status'] = 'A404';
            }
        }

        echo json_encode($message);
    }

    function findPw() {
        $message = array();
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phone = $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'];

        if($email === '' || $name === '' || $_POST['phone1'] === '' || $_POST['phone2'] === '' || $_POST['phone3'] === '') {
            $message['status'] = 'A400';
        } else {
            $sql = "SELECT * FROM users WHERE user_email = '$email' and user_name = '$name' and user_phone = '$phone'";
            $users = mysqli_get_query($sql);
            if(count($users) > 0) {
                $message['status'] = 'A200';
                $message['email'] = $users[0]['user_email'];
            } else {
                $message['status'] = 'A404';
            }
        }
        echo json_encode($message);
    }

    function changePw() {
        $message = array();
        $email = $_POST['email'];
        $pw = $_POST['password'];
        $rePw = $_POST['rePassword'];
        if($email === "" || $pw === "" || $rePw === "") {
            $message['status'] = 'A400';
        } else {
            $encPw = hash('sha256', $pw);
            $sql = "UPDATE users SET user_password = '$encPw' WHERE user_email = '$email'";
            $result = mysqli_set_query($sql);
            if($result) {
                $message['status'] = 'A200';
            } else {   
                $message['status'] = 'A500';
            }
        }
        echo json_encode($message);
    }

    function modify() {
        $message = array();
        $email = $_SESSION['alife_user_email'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        if($name === '' || $phone === '' || $address === '') {
            $message['status'] = 'A400';
        } else {
            $sql = "UPDATE users SET user_name='$name', user_phone='$phone', user_address='$address' WHERE user_email='$email'";
            $result = mysqli_set_query($sql);
            if($result) {
                $_SESSION['alife_user_name'] = $name;
                $_SESSION['alife_user_phone'] = $phone;
                $_SESSION['alife_user_address'] = $address;
                $message['status'] = 'A200';
            } else {
                $message['status'] = 'A500';
            }
        }
        echo json_encode($message);
    }  

    function logout() {
        $message = array();
        session_destroy();
        $message['status'] = 'A200';
        
        echo json_encode($message);
    }

    function getUserPoint() {
        if(isset($_SESSION['alife_user_email'])) {
            $user = $_SESSION['alife_user_email'];
            $sql = "SELECT user_point FROM users WHERE user_email='$user'";
            $point = mysqli_get_query($sql);
            echo $point[0]['user_point'];
        } else {
            echo 'undefined';
        }
    }

    function getAllUsers() {
        $sql = "SELECT * FROM users";
        $users = mysqli_get_query($sql);
        echo json_encode($users);
    }

    function removeUser() {
        $message = array();
        $email = file_get_contents('php://input');

        $sql = "DELETE FROM users WHERE user_email='$email'";
        $result = mysqli_set_query($sql);
        $sql = "DELETE FROM fridge WHERE user_email='$email'";
        $result = mysqli_set_query($sql);
        $sql = "DELETE FROM collection WHERE user_email='$email'";
        $result = mysqli_set_query($sql);
        $sql = "DELETE FROM thumbsup WHERE user_email='$email'";
        $result = mysqli_set_query($sql);

        $message['status'] = $result ? 'A200' : 'A500';
        session_destroy();
        echo json_encode($message);
    }

    function setReport() {
        $message = array();
        $json = json_decode(file_get_contents('php://input'));
        if(isset($_SESSION['alife_user_email'])) {
            $user = $_SESSION['alife_user_email'];
            $sql = "INSERT report VALUES('', $json->id, '$json->content', '$user')";
            $result = mysqli_set_query($sql);
            $message['status'] = $result ? 'A200' : 'A500';
        } else {
            $message['status'] = 'A400';
        } 
        echo json_encode($message);
    }

    function getReports() {
        $sql = "SELECT c.collection_title, (SELECT u.user_name FROM users u WHERE u.user_email = c.user_email) report_user, u.user_name, r.report_content FROM report r
            JOIN collection c ON c.collection_id = r.collection_id
            JOIN users u ON u.user_email = r.user_email";
        $reports = mysqli_get_query($sql);
        echo json_encode($reports);
    }

    $urls[3]();
?>