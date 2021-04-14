<?php
    include 'modules/mysql.php';

    function login() {
        $message = array();
        $id = $_POST['id'];
        $pw = $_POST['password'];

        if($id === "" || $pw === "") {
            $message['status'] = 'A400';
        } else {
            $encPw = hash('sha256', $pw);
            $sql = "select * from users where user_id='$id' and user_password='$encPw'";
            $users = mysqli_get_query($sql);
            if(count($users) == 1) {
                $users = $users[0];
                $_SESSION['alife_user_id'] = $users['user_id'];
                $_SESSION['alife_user_password'] = $users['user_password'];
                $_SESSION['alife_user_name'] = $users['user_name'];
                $_SESSION['alife_user_phone'] = $users['user_phone'];
                $_SESSION['alife_user_address'] = $users['user_address'];
                $_SESSION['alife_user_rank'] = $users['user_rank'];

                $message['status'] = 'A200';
            } else {
                $message['status'] = 'A404';
            }
        }

        echo json_encode($message);
    }

    function signUp() { 
        $message = array();
        $id = $_POST['id'];
        $pw = $_POST['password'];
        $name = $_POST['name'];
        $phone = $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'];
        $address = $_POST['address'];
        
        if($id === "" || $pw === "" || $name === "" || $_POST['phone1'] === "" || $_POST['phone2'] === "" || $_POST['phone3'] === "" || $address === "") {
            $message['status'] = 'A400';
        } else {
            $encPw = hash('sha256', $pw);
            $sql = "insert into users values('$id','$encPw','$name','$phone','$address',0)";
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
        $id = $_POST['id'];

        $sql = "select * from users where user_id = '$id'";
        $users = mysqli_get_query($sql);
        if(count($users) == 1) {
            $message['status'] = 'A409';
        } else {
            $message['status'] = 'A200';
        }
        
        echo json_encode($message);
    }

    function findId() {
        $message = array();
        $name = $_POST['name'];
        $phone = $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'];

        if($name === '' || $_POST['phone1'] === '' || $_POST['phone2'] === '' || $_POST['phone3'] === '') {
            $message['status'] = 'A400';
        } else {
            $sql = "select * from users where user_name = '$name' and user_phone = '$phone'";
            $users = mysqli_get_query($sql);
            if(count($users) == 1) {
                $message['status'] = 'A200';
                $message['id'] = $users[0]['user_id'];
            } else {
                $message['status'] = 'A409';
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

    $urls[3]();
?>