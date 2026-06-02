<h1>MODIFICAR USUARIO</h1>

<form action="/desarrollo_servidor/Showcooking/public/index.php/admin/modificarUsuario" method="post">

    <label for="username">Nombre de usuario a modificar:</label>
    <input type="text" id="username" name="username">
    <br><br>
    <label for="username">Nombre de usuario nuevo:</label>
    <input type="text" id="username" name="username_nuevo">
    <br><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena_nueva" required>
    <br><br>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email_nuevo" required>
    <br><br>

    <label for="id_rol_nuevo">Rol:</label>
    <select id="id_rol" name="id_rol_nuevo" required>
        <option value="1">admin</option>
        <option value="2">cocinero</option>
        <option value="3">visitante registrado</option>
    </select>
    <br><br>
    
    <button type="submit">Editar usuario</button>
</form>

<form action='/desarrollo_servidor/Showcooking/public/index.php/admin/imprimirPanel'>
    <button>Volver Atrás</button>
</form>