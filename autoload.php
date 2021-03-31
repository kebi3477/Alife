<?php
    spl_autoload_register(function($path) {
        $path = str_replace('\\', '/', $path);
        $paths = explode('/', $path);

        if(preg_match('/model/', strtolower($paths[1]))) {
            $className = 'models';
        } else if(preg_match('/controller/', strtolower($path[1]))) {
            $className = 'controllers';
        } else {
            $className = 'views';
        }

        $loadpath = $paths[0].'/'.$className.'/'.$path[2].'.php';
        echo "autoload $path : $loadpath <br>";

        if(!file_exists($loadpath)) {
            echo "404";
            exit();
        }

        require_once $loadpath;
    })
?>