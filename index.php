<?php
    $urls = explode("/",$_SERVER['REQUEST_URI']);
    if($urls[1] == "") {
        $type = 'index';
    } else {
        $type = $urls[1];
    }
    $dir = "\\$type\\";

    if($type == 'controller') {
        $controllerType = $urls[2];
        $url = __DIR__.$dir.$controllerType."Controller.php";
        require_once $url;
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