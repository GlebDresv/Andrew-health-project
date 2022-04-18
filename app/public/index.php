<?php
require_once "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peoples = ["Iryna", "Ihor", "Bruno", "Sasha", "Herby", "Alex"];
    $cities = ['Kiev', "Paris", "Narnia", "Vienna", "Helsinki", "Budapest", "Dublin"];

    for ($i = 0; $i < 10; $i++) {
        $row = [$peoples[rand(0, count($peoples) - 1)], $cities[rand(0, count($cities) - 1)], (rand(20, 120))];
        $file_content[] = implode(",", $row);
    }
    $res = implode("\n", $file_content);
    file_force_download($res);
} else {
    ?>
    <form method="POST">
        <input type="submit" class="button" value="Download" name="button">
    </form>
    <?php
}


?>
