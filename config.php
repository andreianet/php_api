<?php
$db_host = "localhost";
$db_name = "";
$db_user = "";
$db_pass = "";

$pdo = new PDO("mysql:dbname=$db_name;hots=$db_host",$db_user,$db_pass);

$array = [
    'error' => '',
    'result' => []
];

