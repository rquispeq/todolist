<?php 
    require 'database.php';
    session_start();

    if (!isset($_SESSION['logged_in'])) {

        if ($_SERVER['REQUEST_METHOD'] != 'POST' && !empty($_POST)) {
            header('Location:index.php');
        }
    
        if ($_POST['username'] != 'rquispeq' && $_POST['password'] != '123456') {
            header('Location:index.php');
        }
        
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['logged_in'] = true;
    }
    
    $username = $_SESSION['username'];

    $lista_todo = obtener_listas($username, $conexion);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
</head>
<body>
    Bienvenido <?php echo $username; ?>
    <a href="logout.php">Salir</a>
    <p> Nueva Lista </p>
    <form action="addlist.php" method="post">
        <p>
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" id="titulo"><br>
        </p>
        <p>Contenido: </p>
            <textarea name="contenido" id="contenido" cols="35" rows="10"></textarea>
        <p>
            <input type="submit" value="Registrar">
        </p>
    </form>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Contenido</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_todo as $lista): ?>
                <tr>
                    <td><?php echo $lista['titulo'] ?></td>
                    <td><?php echo $lista['contenido'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $lista['id']?>">Editar</a>&nbsp;
                        <?php if ($lista['estado'] == 2) :?>
                            Hecho
                        <?php else :?>
                            <a href="done.php?id=<?php echo $lista['id']?>">Realizado</a>&nbsp;
                        <?php endif; ?>
                        
                        <a href="delete.php?id=<?php echo $lista['id']?>">Eliminar</a>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        
    </table>
</body>
</html>