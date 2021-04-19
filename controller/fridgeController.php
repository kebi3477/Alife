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

        mysqli_set_query("DELETE FROM fridge WHERE user_email = '$user'");
        foreach($ids as $index => $id) {
            $x = $xs[$index];
            $y = $ys[$index];
            mysqli_set_query("INSERT INTO fridge VALUES('',$id,'$user',$x,$y)");
            $message['status'] = 'A200';
        }
        echo json_encode($message);
    }

    function getMyFridge() {
        $user = $_SESSION['alife_user_email'];
        $fridges = mysqli_get_query("SELECT * FROM fridge f, ingredient i WHERE f.ingredient_id = i.ingredient_id AND f.user_email = '$user'");
        echo json_encode($fridges);
    }

    $urls[3]();
?>