<h1>MODIFICAR SHOWCOOKING</h1>

<form action="/desarrollo_servidor/Showcooking/public/index.php/cocinero/actualizarShowcooking" method="post">

    <!-- Titulo -->
    <label for="titulo">Titulo de showcooking que quieres modificar:</label>
    <input type="text" name="titulo" id="titulo" required>
    <br><br>
    <!-- Titulo Nuevo-->
    <label for="titulo_nuevo">Titulo Nuevo</label>
    <input type="text" name="titulo_nuevo" id="titulo_nuevo" required>
    <br><br>
    <!-- descripcion -->
    <label for="descripcion_nueva">Descripcion nueva</label>
    <input type="text" name="descripcion_nueva" id="descripcion_nueva" required>
    <br><br>
    <!-- url -->
    <label for="url_youtube_nueva">Youtube URL</label>
    <input type="text" name="url_youtube_nueva" id="url_youtube_nueva" required>
    <br><br>
    <!-- fecha creacion SYSDATE-->
    <!-- foto_url -->
    <label for="foto_url_nueva">Foto URL</label>
    <input type="text" name="foto_url_nueva" id="foto_url_nueva" required>
    <br><br>
    <!-- chefs -->
     <label for="chefs_nuevos">Chefs</label>
    <input type="text" name="chefs_nuevos" id="chefs_nuevos" required>
    <br><br>
    <!-- categoria -->
       <label for="categoria_nueva">Categoria</label>
    <input type="text" name="categoria_nueva" id="categoria_nueva" required>
    <br><br>
    <!-- publicado de primeras 0 -->
    <!-- id_propietario -->
    <button type="submit">Actualizar ShowCooking</button>
    <br><br>
</form>

<form action='/desarrollo_servidor/Showcooking/public/index.php/cocinero/imprimirPanel'>
    <button>Volver Atrás</button>
</form>