<?php

require_once __DIR__ . '/../vendor/autoload.php';


$app = new Silex\Application();


require __DIR__ . '/../resources/config/prod.php';



require __DIR__ . '/../src/app.php';

echo 'test 3 ';

$app['http_cache']->run();
