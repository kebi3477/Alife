<?php
    function isLoging() {
        if(!isset($_SESSION['alife_user_email'])) {
            echoScript('로그인을 해주세요!', 'login');
        }
    }

    function isNonLoging() {
        if(isset($_SESSION['alife_user_email'])) {
            echoScript('로그인 상태입니다!', 'index');
        }
    }

    function echoScript($text, $location) {
        echo "<script>
        alert('$text');
        location.href='$location'
        </script>";
    }

?>