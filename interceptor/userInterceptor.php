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

    function isAdmin() {
        isLoging();
        if($_SESSION['alife_user_rank'] < 1) {
            echoScript('관리자가 아닙니다!', 'index');
        }
    }

    function isSuperAdmin() {
        isLoging();
        if($_SESSION['alife_user_rank'] < 99) {
            echoScript('관리자가 아닙니다!', 'index');
        }
    }

    function echoScript($text, $location) {
        echo "<script>
        alert('$text');
        location.href='$location'
        </script>";
    }
?>