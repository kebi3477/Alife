<?php
    $urls = explode("/",$_SERVER['REQUEST_URI']);
    if($urls[1] == "") {
        $type = 'index';
    } else {
        $type = $urls[1];
    }
    if($type == 'controller') {
        $dir = '\\controller\\';
    } else if($type == 'model') {
        $dir = '\\model\\';
    } else {
        $dir = '\\public\\views\\';
        $url = __DIR__.$dir.$type.".php";
        if(is_file($url)) {
            require_once $url;
        } else {
            require_once __DIR__.'\\public\\error\\404.php';
        }
    }
?>