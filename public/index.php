<?php
session_start();

use Framework\Database;
use Framework\Route;


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../util/helper.php';
require basePath('route.php');



$config = require basePath('config/db.php');


$db = new Database($config);

Route::route();