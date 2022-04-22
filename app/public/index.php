<?php
require_once "functions.php";

$request = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER["REQUEST_METHOD"];

if ($request == '/upload' and $request_method == "POST"){
    require __DIR__ . '/pages/upload.php';
}elseif($request == '/download' and $request_method == "POST"){
    require __DIR__ . '/pages/download.php';
}elseif($request == '/clients' and $request_method == "GET"){
    require __DIR__ . '/pages/clients.php';
}elseif($request == '/'){
    require __DIR__ . '/pages/main.php';
}else{
    http_response_code(404);
}


