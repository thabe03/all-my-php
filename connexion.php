<?php

$DB_HOST = 'remotemysql.com';
$DB_NAME = getenv('username');
$DB_PASSWORD = getenv('dbpass');

$dsn = "mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME;

$pdo = new PDO($dsn, $DB_NAME, $DB_PASSWORD);

?>