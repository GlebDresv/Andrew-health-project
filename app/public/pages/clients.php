<?php
header('Content-Type: application/json');


$dsn = 'mysql:host=mysql;dbname=db';
$user = "root";
$pass = "root";
$clients =array();

$dbh = new PDO($dsn, $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_out = "SELECT name FROM people";
foreach ($dbh->query($sql_out) as $row) {
    $clients[] = $row['name'];
}
$str = json_encode($clients, JSON_UNESCAPED_UNICODE);
echo $str;