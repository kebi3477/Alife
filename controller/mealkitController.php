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

        if($name == "" || $cname == "" || $price == "" || $sprice == "" || $sfee == "" || $psfee == "" || $weight == "" || $serving == "") {
            $message['status'] = 'A400';
        } else {
            $sql = "INSERT INTO mealkit VALUES('', '$name', '$cname', $price, $sprice, $sfee, $psfee, $weight, $serving, '$user')";
            $result = mysqli_set_query($sql);
            $message['status'] = $result ? 'A200' : 'A500';
        }

        echo json_encode($message);
    }

    function getMealkitByFridge() {
        $sql = "SELECT mealkit_id, mealkit_cname, mealkit_name, mealkit_price, mealkit_sprice FROM mealkit";
        $results = mysqli_get_query($sql);
        echo json_encode($results);
    }

    $urls[3]();
?>