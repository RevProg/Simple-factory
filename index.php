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
echo '<pre>';

$factory = new Factory();

$factory->addType(new MyHydra1(2, 5, 4));
$factory->addType(new MyHydra2());

var_dump($factory->createMyHydra1(5));

$unionRobot = new UnionRobot();
$unionRobot->addRobot(new MyHydra2(4, 4, 2));
$unionRobot->addRobot($factory->createMyHydra1(2));

var_dump($unionRobot);

$factory->addType($unionRobot);

$res = reset($factory->createUnionRobot(1));

// Результатом роботи методу буде мінімальна швидкість з усіх об’єднаних роботів
echo $res->getSpeed().PHP_EOL;

// Результатом роботи методу буде сума всіх ваг об’єднаних роботів
echo $res->getWeight().PHP_EOL;
echo $res->getHeight().PHP_EOL;
echo '</pre>';
