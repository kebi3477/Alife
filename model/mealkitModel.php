<?php
    include 'modules/mysql.php';
    session_start();    

    function setMealkit() {
        $message = array();
        $name = $_POST['name'];
        $cname = $_POST['cname'];
        $price = $_POST['price'];
        $sprice = $_POST['sprice'];
        $sfee = $_POST['sfee'];
        $psfee = $_POST['psfee'];
        $weight = $_POST['weight'];
        $serving = $_POST['serving'];
        $titleImages = $_FILES['title_images'];
        $detailImages = $_FILES['detail_images'];
        $user = $_SESSION['alife_user_email'];
        $num = mysqli_get_query("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'mealkit' AND table_schema = 'alife'")[0]['AUTO_INCREMENT'];
        $path = "mealkits/$num";
        $uploadCheck = 1;

        if($name == "" || $cname == "" || $price == "" || $sprice == "" || $sfee == "" || $psfee == "" || $weight == "" || $serving == "") {
            $message['status'] = 'A400';
        } else {
            if(!is_dir($path)) mkdir($path, 0777, true);
            else $uploadCheck = 0;
            //title image upload
            foreach($titleImages['tmp_name'] as $index => $tmpName) {
                $path = "mealkits/$num/";
                $path .= $index ? "title_img_".$index.".jpg" : "title_img.jpg";
                if($uploadCheck) $uploadCheck = move_uploaded_file($tmpName, $path);
            }
            //detail image upload
            foreach($detailImages['tmp_name'] as $index => $tmpName) {
                $path = "mealkits/$num/";
                $path .= $index ? "detail_img_".$index.".jpg" : "detail_img.jpg";
                if($uploadCheck) $uploadCheck = move_uploaded_file($tmpName, $path);
            }
            if($uploadCheck) {
                $sql = "INSERT INTO mealkit VALUES('', '$name', '$cname', $price, $sprice, $sfee, $psfee, $weight, $serving, '$user')";
                $result = mysqli_set_query($sql);
                $message['status'] = $result ? 'A200' : 'A500';
            } else {
                $message['status'] = 'A500';
            }
        }

        echo json_encode($message);
    }

    function getMealkitByFridge() {
        $sql = "SELECT mealkit_id, mealkit_cname, mealkit_name, mealkit_price, mealkit_sprice FROM mealkit";
        $mealkits = mysqli_get_query($sql);
        echo json_encode($mealkits);
    }

    function getMealkitByWriter() {
        $user = $_SESSION['alife_user_email'];
        $sql = "SELECT mealkit_id, mealkit_cname, mealkit_name, mealkit_price, mealkit_sprice
            FROM mealkit
            WHERE user_email = '$user'";
        $mealkits = mysqli_get_query($sql);
        echo json_encode($mealkits);
    }

    function getMealkitByThumbsup() {
        $user = $_SESSION['alife_user_email'];
        $sql = "SELECT m.mealkit_id, m.mealkit_cname, m.mealkit_name, m.mealkit_price, m.mealkit_sprice
            FROM mealkit m
            JOIN thumbsup t ON t.mealkit_id = m.mealkit_id AND t.user_email='$user'";
        $mealkits = mysqli_get_query($sql);
        echo json_encode($mealkits);
    }

    function setThumbsup() {
        $message = array();
        $mealkit_id = $_POST['id'];
        
        if(isset($_SESSION['alife_user_email'])) {
            $user = $_SESSION['alife_user_email'];
            $sql = "SELECT * FROM thumbsup WHERE user_email='$user' AND mealkit_id=$mealkit_id";
            $result = mysqli_get_query($sql);

            if(count($result) > 0) {
                $sql = "DELETE FROM thumbsup WHERE mealkit_id = $mealkit_id and user_email = '$user'";
                $result = mysqli_set_query($sql);
                $message['status'] = 'A401';
            } else {
                $sql = "INSERT INTO thumbsup VALUES('', '$user', '', $mealkit_id, NOW())";
                $result = mysqli_set_query($sql);

                if($result) $message['status'] = 'A200';
                else $message['status'] = 'A500';
            }
        } else {
            $message['status'] = 'A400';
        }

        echo json_encode($message);
    }

    function setPayment() {
        $message = array();
        $mealkit_id = $_POST['id'];
        $payment_amount = $_POST['amount'];
        $payment_price = $_POST['price'];
        $payment_uid = $_POST['uid'];
        $user = $_SESSION['alife_user_email'];

        if(count($mealkit_id) <= 0 || count($payment_amount) <= 0 || $payment_uid == '') {
            $message['status'] = 'A400';
        } else {
            foreach($mealkit_id as $index => $id) {
                $price = $payment_price[$index];
                $amount = $payment_amount[$index];
                $sql = "INSERT INTO payment VALUES('', $id, $amount, $price, '$payment_uid', '$user', now())";
                $result = mysqli_set_query($sql);
            }
            $message['status'] = $result ? 'A200' : 'A500';
        }
        echo json_encode($message);
    }

    function getPayment() {
        $message = array();
        $user = $_SESSION['alife_user_email'];
        $sql = "UPDATE users SET user_point = user_point+5 WHERE user_email = '$user'";
        $result = mysqli_set_query($sql);
        if($result) {
            $sql = "SELECT * FROM payment p
                JOIN mealkit m ON p.mealkit_id = m.mealkit_id AND p.user_email = '$user'";
            $payment = mysqli_get_query($sql);
            echo json_encode($payment);
        } else {
            $message['status'] = 'A500';
            echo json_encode($message);
        }
    }

    function isThumbsup() {
        $message = array();
        $json = json_decode(file_get_contents('php://input'));
        if(isset($_SESSION['alife_user_email'])) {
            $user = $_SESSION['alife_user_email'];
            $sql = "SELECT * FROM thumbsup WHERE mealkit_id=$json->url AND user_email='$user'";
            $result = mysqli_get_query($sql);
            if(count($result) > 0) {
                $message['status'] = 'A200';
            } else {
                $message['status'] = 'A400';
            }
        } else {
            $message['status'] = 'A400';
        }
        echo json_encode($message);
    }

    $urls[3]();
?>