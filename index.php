<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/lib/DB/MysqliDb.php';
require_once __DIR__ . '/app/controllers/AirCompanyController.php';

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$Company=new AirCompanyController($db);
$Company->index();







?>