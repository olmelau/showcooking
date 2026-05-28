<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="index.php/login/comprobarUsuarioExiste" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="admin_chef">
        <label for="username">Contraseña:</label>
        <input type="text" name="contrasena" id="contrasena" value="pass123">
        <button type="submit">Log in</button>



    </form>
</body>
</html>