<?php
    include 'modules/mysql.php';

    function getIngredients() {
        $type = $_POST['type'];

        if($type == "")
            $ingredients = mysqli_get_query("SELECT * FROM ingredient");
        else
            $ingredients = mysqli_get_query("SELECT * FROM ingredient WHERE ingredient_type = '$type'");

        echo json_encode($ingredients);
    }

    function saveFridge() {
        $message = array(); 
        $ids = explode(",", $_POST['ingredient_ids']);
        $xs = explode(",", $_POST['fridge_xs']);
        $ys = explode(",", $_POST['fridge_ys']);
        $user = $_SESSION['alife_user_email'];

        $result = mysqli_set_query("DELETE FROM fridge WHERE user_email = '$user'");
        if($result) {
            foreach($ids as $index => $id) {
                $x = $xs[$index];
                $y = $ys[$index];
                mysqli_set_query("INSERT INTO fridge VALUES('',$id,'$user',$x,$y)");
            }
            $message['status'] = 'A200';
        } else {
            $message['status'] = 'A500';
        }
        echo json_encode($message);
    }

    function getMyFridge() {
        $user = $_SESSION['alife_user_email'];
        $fridges = mysqli_get_query("SELECT * FROM fridge JOIN ingredient ON fridge.ingredient_id = ingredient.ingredient_id WHERE fridge.user_email = '$user'");
        // $fridges = mysqli_get_query("SELECT * FROM fridge f, ingredient i WHERE f.ingredient_id = i.ingredient_id AND f.user_email = '$user'");
        echo json_encode($fridges);
    }

    function resetFridge() {
        $user = $_SESSION['alife_user_email'];
        $result = mysqli_set_query("DELETE FROM fridge WHERE user_email = '$user'");
        $message['status'] = $result ? 'A200' : 'A500';
        echo json_encode($message);
    }

    function setRecipe() {
        $message = array();
        $title = $_POST['title'];
        $intro = $_POST['intro'];
        $image = $_FILES['rep_img'];
        $time = $_POST['time'];
        $serving = $_POST['serving'];
        $hashtags = $_POST['hashtags'];
        $imageName = $image['name'];
        $user = $_SESSION['alife_user_email'];
        $result = mysqli_set_query("INSERT INTO collection VALUES('','$title','$intro','$imageName','$time','$serving','$hashtags',NOW(),'$user')");
        
        if($result) {
            $message['status'] = 'A200';
        } else {
            $message['status'] = 'A500';
        }
        echo json_encode($message);
    }

    $urls[3]();
?>