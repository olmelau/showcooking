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
        <input type="password" name="contrasena" id="contrasena" value="pass123">
        <button type="submit">Log in</button>
    </form>

    <h1>Registrarse</h1>
    <form action="index.php/login/registrarse" method="POST">
         <label for="username">Username:</label>
        <input type="text" name="username_registro" id="username_registro">
        <label for="username">Contraseña:</label>
        <input type="password" name="contrasena_registro" id="contrasena_registro">
        <label for="username">Email:</label>
        <input type="email" name="email_registro" id="email_registro">
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>