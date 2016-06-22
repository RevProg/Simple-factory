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

$factory = new Factory();

$factory->addType(new MyHydra1());
$factory->addType(new MyHydra2());

var_dump($factory->createMyHydra1(5));