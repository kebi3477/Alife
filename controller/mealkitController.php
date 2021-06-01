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
                print_r($titleImages);
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
        $results = mysqli_get_query($sql);
        echo json_encode($results);
    }

    $urls[3]();
?>