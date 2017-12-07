<?php 
    $localhost = 'localhost';
    $port = 3306;
    $user_bd = 'root';
    $password_bd = '';
    $db_name = 'todolist';

    $conexion = null;

    try{
        $conexion = new PDO('mysql:host='.$localhost.';dbname='.$db_name, $user_bd, $password_bd);
    } catch( PDOException $error_bd){
        print "!Error: " . $error_bd->getMessage() . '<br>';
        die();
    }

    function obtener_listas($username,$conexion){
        $statement = "select * from list where usuario = '" . $username . "' and estado in (1,2)";
        $sql = $conexion->query($statement);
        return $sql->fetchAll();
    }

    function insert_lista($titulo, $texto, $username, $conexion){
        $statement = $conexion->prepare('insert into list (titulo, contenido, estado, usuario) values(:titulo,:texto, 1, :username)');
        $statement->execute(array('titulo' => $titulo, 'texto' => $texto, 'username' => $username));
    }

    function obtener_lista($id, $conexion){
        $statement = $conexion->prepare('select * from list where id = :id_lista');
        $statement->execute(array('id_lista' => $id));
        return $statement->fetchAll();
    }

    function delete_lista($id, $conexion){
        $statement = $conexion->prepare('update list set estado = 0 where id = :id_lista');
        $statement->execute(array('id_lista' => $id));
    }

    function mark_done($id, $conexion){
        $statement = $conexion->prepare('update list set estado = 2 where id = :id_lista');
        $statement->execute(array('id_lista' => $id));
    }

    function updateList($id, $titulo, $texto, $username, $conexion){
        $statement = $conexion->prepare('update list set titulo = :new_titulo, contenido = :new_contenido where id = :id_lista');
        $statement->execute(
            array('id_lista' => $id,
                'new_titulo' => $titulo,
                'new_contenido' => $texto,
            )
        );
    }


?>