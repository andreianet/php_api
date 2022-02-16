<?php

header("Access-Control-Allow-Origin:*");
//métodos de requisoção
header("Access-Control-Allow-Methods:GET, POST, PUT, DELETE, OPTIONS");
//Info in JSON
header("content-type: application/json");
echo json_encode($array);
exit;

?>