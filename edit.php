<?php 
    require 'database.php';

    session_start();
    if (!isset($_SESSION['logged_in'])) {
        header('Location:index.php');
    }

    $username = $_SESSION['username'];

    $id = $_GET['id'];
    
    if (!isset($id)) {
        header('Location: index.php');
    }
    
    $lista = obtener_lista($id, $conexion);
    $lista = $lista[0];

    if (empty($lista)) {
        header('Location:index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar datos</title>
</head>
<body>
    Bienvenido <?php echo $username; ?>
    <a href="logout.php">Salir</a>
    <p> Nueva Lista </p>
    <form action="update.php" method="post">
        <p>
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" id="titulo" value="<?php echo $lista['titulo']?>"><br>
        </p>
        <p>Contenido: </p>
            <textarea name="contenido" id="contenido" cols="35" rows="10"><?php echo $lista['contenido']  ?></textarea>
        <p>
            <input type="submit" value="Actualizar">
        </p>
        <input type="hidden" value="<?php echo $id?>" name="id">
    </form>
</body>
</html>