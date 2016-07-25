<?php

require_once __DIR__ . '/../vendor/autoload.php';

define('FACEBOOK_API_KEY',    '');
define('FACEBOOK_API_SECRET', '');
define('TWITTER_API_KEY',     '');
define('TWITTER_API_SECRET',  '');
define('GOOGLE_API_KEY',      '');
define('GOOGLE_API_SECRET',   '');
define('GITHUB_API_KEY',      '');
define('GITHUB_API_SECRET',   '');


$app = new Silex\Application();

$app['debug'] = true;





require __DIR__ . '/../resources/config/prod.php';



require __DIR__ . '/../src/app.php';


$app['http_cache']->run();
