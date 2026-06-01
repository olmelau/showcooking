<h1>AÑADIR NUEVO USUARIO</h1>

<form action="/desarrollo_servidor/Showcooking/public/index.php/admin/crearUsuario" method="post">

    <label for="username">Nombre de usuario:</label>
    <input type="text" id="username" name="username" required>
    <br><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required>
    <br><br>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label for="id_rol">Rol:</label>
    <select id="id_rol" name="id_rol" required>
        <option value="1">admin</option>
        <option value="2">cocinero</option>
        <option value="3">visitante registrado</option>
    </select>
    <br><br>

    <button type="submit">Crear usuario</button>




</form>