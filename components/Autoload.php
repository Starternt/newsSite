<?php

spl_autoload_register('autoload');
function autoload($classname){
    $paths = array('/components/', '/models/');
    foreach($paths as $path){
        $fileName = ROOT.$path.$classname.'.php';
        if(is_file($fileName)){
            include_once($fileName);
        }
    }
}