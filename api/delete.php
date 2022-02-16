<?php

require('../config.php');

/**
 * Verificar o Method
 */
$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'delete') {

    parse_str(file_get_contents('php://input'), $input);

    $id = $input['id'] ?? null;

    $id = filter_var($id);

        if ($id) {

            $sql = $pdo->prepare('DELETE FROM notes WHERE id = :id');
            $sql->bindValue(':id', $id);                    
            $sql->execute();  
            $array['result'] = 'Delete with Sucess';
        }else{
            $array['error'] = 'ID not  Sent!';
        }    

}else {
    $array['error'] = "Method 'delete' not supported";
}

require('../return.php');

?>