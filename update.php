<?php 
    require 'database.php';
    session_start();
    if (!isset($_SESSION['logged_in'])) {
        header('Location:index.php');
    }

    $id = 0;
    $id = $_POST['id'];
    $titulo = '';
    $texto = '';
    $titulo = $_POST['titulo'];
    $texto = $_POST['contenido'];
    
    if ($titulo != '' && $texto != '') {
        updateList($id, $titulo, $texto, $username, $conexion);
    }

    header('Location:index.php');

?>