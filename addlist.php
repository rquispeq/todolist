<?php 
require 'database.php';
session_start();
if (!isset($_SESSION['logged_in']) || $_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location:index.php');
}

$username = $_SESSION['username'];

$titulo = '';
$texto = '';
$titulo = $_POST['titulo'];
$texto = $_POST['contenido'];

if ($titulo != '' && $texto != '') {
    insert_lista($titulo, $texto, $username, $conexion);
}

header('Location:index.php');

?>