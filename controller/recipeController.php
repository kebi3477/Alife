<?php
    include 'modules/mysql.php';

    function setRecipe() {
        $message = array();
        $title = $_POST['title'];
        $intro = $_POST['intro'];
        $time = $_POST['time'];
        $serving = $_POST['serving'];
        $hashtags = $_POST['hashtags'];
        $images = $_FILES['images'];
        $recipe = $_POST['recipe'];
        $ingredients = json_decode($_POST['ingredients'], true);
        $timers = explode(",", $_POST['timers']);
        $user = $_SESSION['alife_user_email'];
        $num = mysqli_get_query("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'collection' AND table_schema = 'alife'")[0]['AUTO_INCREMENT'];
        $path = "recipes/".$num;
        $nullCheck = 0;
        $uploadCheck = 1;
        
        foreach($images['error'] as $error) {
            if($error == 4) {
                $nullCheck = 1;
            }
        }
        if($title == "" || $intro == "" || $time == "" || $serving == "") {
            $nullCheck = 1;
        }
        if($nullCheck) {
            $message['status'] = 'A400';
        } else {
            if(!is_dir($path)) mkdir($path, 0777, true);
            else $uploadCheck = 0;
            
            foreach($images['tmp_name'] as $tmpName) {
                if($uploadCheck) $uploadCheck = checkImageType($tmpName);
            }
            
            if($uploadCheck) {
                //Image Upload
                foreach($images['tmp_name'] as $index => $tmpName) {
                    $path = "recipes/$num/";
                    $path .= $index ? "seq_img_".$index.".jpg" : "reg_img.jpg";
                    if($uploadCheck) $uploadCheck = move_uploaded_file($tmpName, $path);
                }
                //Recipe + Ringredient Upload
                foreach($ingredients as $index => $values) {
                    $result = mysqli_set_query("INSERT INTO recipe VALUES('', $num, $index, '".$recipe[$index]."', $timers[$index])");
                    if($result) {
                        foreach($values as $value) {
                            $result = mysqli_set_query("INSERT INTO ringredient VALUES('', $num, '".$value['name']."', '".$value['amount']."', $index)");
                        }
                    }
                }
                //Collection Upload
                $path .= '/rep_img.jpg';
                $result = mysqli_set_query("INSERT INTO collection VALUES('','$title','$intro','$time','$serving','$hashtags',NOW(),'$user')");
                $message['status'] = $result ? 'A200' : 'A500';
            } else {
                $message['status'] = 'A500';
            }
        }
        echo json_encode($message);
    }

    function checkImageType($tmpName) {
        $typeCheck = 1;
        try {
            $imageType = getimagesize($tmpName)[2];
            if($imageType > 3 || is_null($imageType)) $typeCheck = 0;
        } catch(e) {
            $typeCheck = 0;
        }
        return $typeCheck;
    }

    function getRecipeByTop() {
        $user = $_SESSION['alife_user_email'];
        $arr = array();
        $sql = "SELECT c.collection_id id, c.collection_title title, c.collection_intro intro, u.user_name user, t.thumbsup_id
                FROM collection c
                JOIN users u ON c.user_email = u.user_email
                LEFT JOIN thumbsup t ON t.collection_id = c.collection_id AND t.user_email = '$user'
                ORDER BY c.collection_date desc LIMIT 0, 3";
        $recipes = mysqli_get_query($sql);
        echo json_encode($recipes);
    }

    function getRecipeByFridge() {
        $arr = array();
        $message = array();
        $email = $_SESSION['alife_user_email'];
        $sql = "SELECT i.ingredient_name name, i.ingredient_image image FROM fridge f JOIN ingredient i ON f.ingredient_id = i.ingredient_id WHERE user_email = '$email'";
        $fridge = mysqli_get_query($sql);
        if(count($fridge) > 0) {
            $rand = rand(0, count($fridge)-1);
            $ingredient = $fridge[$rand];
            $sql = "SELECT DISTINCT c.collection_id id, c.collection_title title, c.collection_intro intro, u.user_name user
                FROM collection c
                JOIN ringredient ri ON c.collection_id = ri.collection_id AND ri.ringredient_name like '%".$ingredient['name']."%'
                JOIN users u ON u.user_email = c.user_email";
            $recipes = mysqli_get_query($sql);
            $arr['ingredient'] = $ingredient;
            $arr['recipes'] = $recipes;
            echo json_encode($arr);
        } else {
            $message['status'] = 'A400';
            echo json_encode($message);
        }
    }

    function getRecipeById() {
        $arr = array();
        $id = $_POST['id'];
        
        $sql = "SELECT c.*, u.user_name FROM collection c JOIN users u ON c.user_email=u.user_email WHERE c.collection_id = '$id'";
        $arr['collection'] = mysqli_get_query($sql)[0];
        $sql = "SELECT * FROM recipe WHERE collection_id = '$id'";
        $arr['recipes'] = mysqli_get_query($sql);
        $sql = "SELECT * FROM ringredient WHERE collection_id = '$id'";
        $arr['ringredients'] = mysqli_get_query($sql);
        $sql = "SELECT count(*) thumbsupCnt FROM thumbsup WHERE collection_id = '$id'";
        $arr['count'] = mysqli_get_query($sql)[0]['thumbsupCnt'];

        if(isset($_SESSION['alife_user_email'])) {
            $email = $_SESSION['alife_user_email'];
            $sql = "SELECT IF(count(*) > 0, true, false) isThumbsup FROM thumbsup WHERE collection_id = '$id' and user_email = '$email'";
            $arr['thumbsup'] = mysqli_get_query($sql)[0]['isThumbsup'];
        }

        echo json_encode($arr);
    }
    
    function getRecipeByWriter() {
        $user = $_SESSION['alife_user_email'];
        $sql = "SELECT c.collection_id id, c.collection_title title, c.collection_intro intro, u.user_name user, t.thumbsup_id
            FROM collection c
            JOIN users u ON c.user_email = u.user_email AND u.user_email='$user'
            LEFT JOIN thumbsup t ON t.collection_id = c.collection_id
            ORDER BY c.collection_date desc";
        $recipes = mysqli_get_query($sql);
        echo json_encode($recipes);
    }

    function getRecipeByThumbsup() {
        $user = $_SESSION['alife_user_email'];
        $sql = "SELECT c.collection_id id, c.collection_title title, c.collection_intro intro, u.user_name user, t.thumbsup_id
            FROM collection c
            JOIN users u ON c.user_email = u.user_email
            JOIN thumbsup t ON t.collection_id = c.collection_id AND t.user_email='$user'
            ORDER BY c.collection_date desc";
        $recipes = mysqli_get_query($sql);
        echo json_encode($recipes);
    }

    function setThumbsup() {
        $message = array();
        $collection_id = $_POST['collection_id'];
        
        if(isset($_SESSION['alife_user_email'])) {
            $user = $_SESSION['alife_user_email'];
            $sql = "SELECT * FROM thumbsup WHERE user_email='$user' AND collection_id=$collection_id";
            $result = mysqli_get_query($sql);

            if(count($result) > 0) {
                $sql = "DELETE FROM thumbsup WHERE collection_id = $collection_id and user_email = '$user'";
                $result = mysqli_set_query($sql);
                $message['status'] = 'A401';
            } else {
                $sql = "INSERT INTO thumbsup VALUES('', '$user', $collection_id)";
                $result = mysqli_set_query($sql);

                if($result) $message['status'] = 'A200';
                else $message['status'] = 'A500';
            }
        } else {
            $message['status'] = 'A400';
        }

        echo json_encode($message);
    }

    $urls[3]();
?>