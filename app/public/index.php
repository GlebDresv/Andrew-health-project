<?php
$user = "root";
$pass = "root";
$peoples = [["Пупкин Степан Леонидович","Киев","120"],["Акопян Светлана Юриевна","Ивано-Франковск","74"],["Заболотная Юлия Сергеевна","Лондон","87"]];

try {
    $dbh = new PDO('mysql:host=mysql;dbname=db', $user, $pass);
    echo "Подключились\n";
} catch (Exception $e) {
    die("Не удалось подключиться: " . $e->getMessage());
}

try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->beginTransaction();
    foreach ($peoples as $people) {
        $dbh->exec("insert into db (name, city, mass) values ($people[1], $people[2], $people[3])");
    }
    $dbh->commit();
    $dbh = null;
}
catch (Exception $e) {
    $dbh->rollBack();
    echo "Ошибка: " . $e->getMessage();
}

?>






