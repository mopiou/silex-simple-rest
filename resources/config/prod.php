<?php
$app['log.level'] = Monolog\Logger::ERROR;
$app['api.version'] = "v1";
$app['api.endpoint'] = "/api";
<<<<<<< HEAD
$app['db.options'] = array(
  "driver" => "pdo_mysql",
  "user" => "root",
  "password" => "root",
  "dbname" => "testSilex",
  "host" => "localhost:8888",
=======



$app['db.options'] = array (
   'driver'    => 'pdo_mysql',
   'host'      => 'azakinechttest.mysql.db',
   'dbname'    => 'azakinechttest',
   'user'      => 'azakinechttest',
   'password'  => 'Testtest01',
   'charset'   => 'utf8',
>>>>>>> master
);


// $app['db.options'] = array(
//   "driver" => "pdo_mysql",
//   "user" => "root",
//   "password" => "root",
//   "dbname" => "testSilex",
//   "host" => "localhost",
// );
