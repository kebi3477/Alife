<?php
    include 'modules/mysql.php';
    if($urls[3] == 'signUp') {
        signUp();
    }

    function signUp() { 
        $id = $_POST['id'];
        $pw = $_POST['password'];
        $name = $_POST['name'];
        $phone = $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'];
        $address = $_POST['address'];

        $message = array();
        $sql = "insert into users values('$id','$pw','$name','$phone','$address',0)";
        mysqli_set_query($sql);
        $message['status'] = 200;
        
        echo json_encode($message);
    }
?>