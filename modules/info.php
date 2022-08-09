<?php
    function getInfo() {
        $obj = new ArrayObject();
        $obj->username = "네이버메일@naver.com";     //이메일 입력
        $obj->password = "네이버 비밀번호";          //비밀번호 입력
        $obj->host     = "smtp.naver.com";          //이메일 호스트 입력, 
        return $obj;
    }
?>