<?php
    include 'modules/mysql.php';
    function isExist($num) {
        $sql = "SELECT * FROM mealkit WHERE mealkit_id=$num";
        $mealkit = mysqli_get_query($sql);
        if(count($mealkit) <= 0) {
            echoScript('경로가 이상합니다!', '../mealkit');
        }
        return $mealkit[0];
    }

    function echoScript($text, $location) {
        echo "<script>
        alert('$text');
        location.href='$location'
        </script>";
    }
?>