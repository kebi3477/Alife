<?php
    include 'modules/mysql.php';

    function login() {
        
    }

    function signUp() { 
        $message = array();
        $id = $_POST['id'];
        $pw = $_POST['password'];
        $name = $_POST['name'];
        $phone = $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'];
        $address = $_POST['address'];

        if(is_null($id) || is_null($pw) || is_null($name) || is_null($_POST['phone1']) || is_null($_POST['phone2']) || is_null($_POST['phone3']) || is_null($address)) {
            $message['status'] = 'A400';
        } else {
            $sql = "insert into users values('$id','$pw','$name','$phone','$address',0)";
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
        if(count($users) > 0) {
            $message['status'] = 'A409';
        } else {
            $message['status'] = 'A200';
        }
        
        echo json_encode($message);
    }

    $urls[3]();
?>