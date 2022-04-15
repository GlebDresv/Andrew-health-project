<?php
ob_start();
$read = readfile("read.txt");
ob_end_clean();
var_dump($read);
$name = $_POST["name"];
$city = $_POST["city"];
$mass = $_POST["mass"];
$dsn = 'mysql:host=mysql;dbname=db';
$user = "root";
$pass = "root";

    $dbh = new PDO($dsn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_in = "INSERT INTO people(name, city, mass)" .
        " VALUES(:name, :city, :mass)";

    if($name != null and $city != null and $mass != null){
        $statement = $dbh->prepare($sql_in);
        $statement->execute([':name'=>$name,':city'=>$city,':mass'=>$mass]);
    }

    $sql_out = "SELECT * FROM people";
    foreach ($dbh->query($sql_out) as $row) {
        print $row['name'] . "\t";
        print $row['city'] . "\t";
        print $row['mass'] . "<br>";
    }