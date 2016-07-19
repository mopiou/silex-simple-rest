<?php

echo 'test 1 ';
require_once __DIR__ . '/../vendor/autoload.php';

echo 'test 2 ';



$app = new Silex\Application();

echo 'test 3 ';

require __DIR__ . '/../resources/config/prod.php';

echo 'test 4 ';

/*

require __DIR__ . '/../src/app.php';

$app['http_cache']->run();
