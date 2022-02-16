<?php

require('../config.php');

/**
 * Verificar o Method
 */
$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'post') {

    $title = filter_input(INPUT_POST, 'title');
    $body = filter_input(INPUT_POST, 'body');

    if ($title && $body) {

        $sql = $pdo->prepare("INSERT INTO notes(title, body) VALUES (:title, :body)");
        $sql->bindValue(':title', $title);
        $sql->bindValue(':body', $body);
        $sql->execute();

        //get Id return
        $id = $pdo->lastInsertId();
            //preenche o return
            $array['result'] = [
                'id' => $id,
                'title' => $title,
                'body' => $body
            ];
        
    }else{
        $array['error'] = 'Field not  Sent!';
    }

} else {
    $array['error'] = "Method 'post' not supported";
}

require('../return.php');

?>