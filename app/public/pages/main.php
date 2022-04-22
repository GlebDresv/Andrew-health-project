<?php

$dsn = 'mysql:host=mysql;dbname=db';
$user = "root";
$pass = "root";

$dbh = new PDO($dsn, $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_out = "SELECT * FROM people";


require __DIR__ . "/../view/main-view.php";
