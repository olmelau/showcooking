<h1>MODIFICAR CATEGORIA</h1>

<form action="/desarrollo_servidor/Showcooking/public/index.php/admin/actualizarCategoria" method="post">

    <label for="nombre_categoria">Nombre de categoria a modificar:</label>
    <input type="text" id="nombre_categoria" name="nombre_categoria" required>
    <br><br>
    <label for="nombre_categoria_nuevo">Nombre de categoria nuevo:</label>
    <input type="text" id="nombre_categoria_nuevo" name="nombre_categoria_nuevo" required>
    <br><br>

    <button type="submit">Editar Categoria</button>
</form>

<form action='/desarrollo_servidor/Showcooking/public/index.php/admin/imprimirPanel'>
    <button>Volver Atrás</button>
</form>