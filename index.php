<?php

function __autoload($className) {
    $dirs = [
        'base',
        'components',
        'concrete',
        'exceptions',
    ];
    
    foreach ($dirs as &$dir) {
        $filePath = $dir.DIRECTORY_SEPARATOR.$className.'.php';
        if (file_exists($filePath))
            require_once $filePath;
    }
}
