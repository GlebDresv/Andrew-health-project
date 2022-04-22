<?php

require_once __DIR__."/../functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['download'])) {
    $dsn = 'mysql:host=mysql;dbname=db';
    $user = "root";
    $pass = "root";

    $dbh = new PDO($dsn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $file_content = "";
    $sql_out = "SELECT * FROM people";
    foreach ($dbh->query($sql_out) as $row) {
        $file_content = $file_content . $row['name'] . "," . $row['city'] . "," . $row['mass'] . "\n";
    }
    file_force_download($file_content);

}