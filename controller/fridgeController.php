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
        $time = $_POST['time'];
        $serving = $_POST['serving'];
        $hashtags = $_POST['hashtags'];
        $image = $_FILES['rep_img'];
        $recipe = $_POST['recipe'];
        $ingredients = json_decode($_POST['ingredients'], true);
        $timers = json_decode($_POST['timers'], true);
        $user = $_SESSION['alife_user_email'];
        $num = mysqli_get_query("SELECT COUNT(*) count FROM collection")[0]['count'];
        $path = "recipe/".++$num;
        
        
        $uploadCheck = 1;
        if($title == "" || $intro == "" || $time == "" || $serving == "" || $image['error'] == 4) {
            $message['status'] = 'A400';
        } else {
            $imageType = getimagesize($image['tmp_name'])[2];
            
            foreach($ingredients as $index => $values) {
                $timer = "00:".$timers[$index]['minute'].":".$timers[$index]['seconds'];
                $result = mysqli_set_query("INSERT INTO recipe VALUES('', $num, $index, '".$recipe[0]."', '$timer')");
                if($result) {
                    foreach($values as $value) {
                        $result = mysqli_set_query("INSERT INTO ringredient VALUES('', $num, '".$value['name']."', '".$value['amount']."')");
                    }
                }
            }
            
            if(!is_dir($path)) {
                mkdir($path, 0777, true);
            } else {
                $uploadCheck = 0;
            }
            if($imageType > 3 || is_null($imageType)) {
                $uploadCheck = 0;
            }
            if($uploadCheck) {
                $path .= '/rep_img.jpg';
                if(move_uploaded_file($image['tmp_name'], $path)) {
                    $result = mysqli_set_query("INSERT INTO collection VALUES('','$title','$intro','$time','$serving','$hashtags',NOW(),'$user')");
                    
                    $message['status'] = $result ? 'A200' : 'A500';
                } else {
                    $message['status'] = 'A500';
                }
            } else {
                $message['status'] = 'A500';
            }
        }
        echo json_encode($message);
    }

    $urls[3]();
?>