<?php 
require 'database.php';

session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location:index.php');
}

$id = $_GET['id'];

if (!isset($id)) {
    header('Location: index.php');
}

$lista = obtener_lista($id, $conexion);

if (!empty($lista)) {
    mark_done($id,$conexion);
}
header('Location:index.php');
?>