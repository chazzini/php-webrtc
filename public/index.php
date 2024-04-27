<?php
session_start();

use Framework\Database;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../util/helper.php';


$config = require basePath('config/db.php');


$db = new Database($config);