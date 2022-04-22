<?php

$dsn = 'mysql:host=mysql;dbname=db';
$user = "root";
$pass = "root";

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit'])) {
    $file = $_FILES['filename']['tmp_name'];
    $dbh = new PDO($dsn, $user, $pass,array(
        PDO::MYSQL_ATTR_LOCAL_INFILE => true,
    ));

    $fieldSeparator = ",";
    $lineSeparator = "\n";

    $affectedRows = $dbh->exec(
        "LOAD DATA LOCAL INFILE "
        . $dbh->quote($file)
        . " INTO TABLE people FIELDS TERMINATED BY "
        . $dbh->quote($fieldSeparator)
        . " LINES TERMINATED BY "
        . $dbh->quote($lineSeparator)
        . " IGNORE 1 LINES "
    );

    header("Location: /");

}


