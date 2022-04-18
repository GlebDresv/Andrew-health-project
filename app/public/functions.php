<?php
function file_force_download($file_content)
{
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="file.csv"');
    header('Content-Transfer-Encoding: binary');
    header("Pragma: public");
    header('Content-Length: ' . strlen($file_content));
// читаем файл и отправляем его пользователю
    echo $file_content;
}