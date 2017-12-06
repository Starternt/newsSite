<?php

spl_autoload_register('autoload');
// Автозагрузка происходит только из указанных в paths папках
function autoload($classname)
{
    $paths = array('/components/', '/models/');
    foreach ($paths as $path) {
        $fileName = ROOT . $path . $classname . '.php';
        if (is_file($fileName)) {
            include_once($fileName);
        }
    }
}