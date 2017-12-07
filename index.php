<?php session_start();
    if (isset($_SESSION['logged_in'])) {
        header('Location:todolist.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do list</title>
</head>
<body>
    <form action="todolist.php" method="post">
        <label for="username">Usuario:  </label>
        <input type="text" name="username" id="username" >
        <label for="password"> Contraseña: </label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>