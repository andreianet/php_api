<?php

require('../config.php');

/**
 * Verificar o Method
 */
$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'get') {

    $id = filter_input(INPUT_GET, 'id');
    if ($id) {
        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);

            $array['result'] = [
                'id' => $data['id'],
                'title' => $data['title'],
                'body' => $data['body']
            ];
        }else {
            $array['error'] = 'ID Not Found';
        }
    }else{
        $array['error'] = 'ID not  Sent!';
    }

} else {
    $array['error'] = "Method 'get' not supported";
}

require('../return.php');

?>