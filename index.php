<?php
    $urls = explode("/",$_SERVER['REQUEST_URI']);
    $type = $urls[2];
    if($type == 'controller') {
        $dir = '\\controller\\';
    } else if($type == 'model') {
        $dir = '\\models\\';      
    } else {
        $dir = '\\public\\views\\';
        require_once __DIR__.$dir.$type.".php";
    }
?>