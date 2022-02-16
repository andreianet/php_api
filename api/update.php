<?php

require('../config.php');

/**
 * Verificar o Method
 */
$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'put') {

    parse_str(file_get_contents('php://input'), $input);

    $id = $input['id'] ?? null;
    $title = $input['title'] ?? null;
    $body = $input['body'] ?? null;

    $id = filter_var($id);
    $title = filter_var($title);
    //var_dump($id = filter_var($id));
    $body = filter_var($body);

        if ($id && $title && $body) {

                $sql = $pdo->prepare('SELECT * FROM notes WHERE id = :id');
                $sql->bindValue(':id', $id);
                $sql->execute();

                if ($sql->rowCount() >  0) {
                    $sql = $pdo->prepare('UPDATE notes SET title = :title, body = :body WHERE id = :id');
                    $sql->bindValue(':id', $id);
                    $sql->bindValue(':title', $title);
                    $sql->bindValue(':body', $body);
                    $sql->execute();

                    $array['result'] = [
                        'id' => $id,
                        'title' => $title,
                        'body' => $body
                    ];
                    //var_dump($array);
                }else{
                    $array['error'] = 'ID not Found!';
                }
        }else{
            $array['error'] = 'Data not  Sent!';
        }    

}else {
    $array['error'] = "Method 'put' not supported";
}

require('../return.php');

?>