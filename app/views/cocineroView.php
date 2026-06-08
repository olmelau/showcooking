<!-- Ver Shocooking -->
<form action="/desarrollo_servidor/Showcooking/public/index.php/cocinero/verShowcookingPropios">
    <h3>Ver Showcookking</h3>
    <button>Ver ShowCooking</button>
</form>



<!-- Insertar Shocooking -->
<h3>Insertar Showcookking</h3>

<form action="/desarrollo_servidor/Showcooking/public/index.php/cocinero/insertarShowcookingNuevo" method="POST">
    <!-- Titulo -->
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" id="titulo" required>
    <br><br>
    <!-- descripcion -->
    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" id="descripcion" required>
    <br><br>
    <!-- url -->
    <label for="url_youtube">Yotube URL</label>
    <input type="text" name="url_youtube" id="url_youtube" required>
    <br><br>
    <!-- fecha creacion SYSDATE-->
    <!-- foto_url -->
    <label for="foto_url">Foto URL</label>
    <input type="text" name="foto_url" id="foto_url" required>
    <br><br>
    <!-- chefs -->
     <label for="chefs">Chefs</label>
    <input type="text" name="chefs" id="chefs" required>
    <br><br>
    <!-- categoria -->
       <label for="categoria">Categoria</label>
    <input type="text" name="categoria" id="categoria" required>
    <br><br>
    <!-- publicado de primeras 0 -->
    <!-- id_propietario -->
    <button>Insertar ShowCooking</button>
</form>


<!-- Actualizar Showcooking -->
 <h3>Actualizar Showcooking</h3>
<form action="/desarrollo_servidor/Showcooking/public/index.php/cocinero/actualizarShowcookingFormulario">
    <button>Actualizar Showcooking</button>
</form>

<!-- Cambiar Visibilidad Showcooking -->
 <h3>Cambiar Visibilidad</h3>
<form action="/desarrollo_servidor/Showcooking/public/index.php/cocinero/cambiarVisibilidad" method="POST">
    
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" id="titulo" required>
    <br><br>
    <!-- publicado -->
    <select name="publicado" id="publicado">
    <option value="0">Privado</option>
    <option value="1">Público</option>
    </select>
    <br><br>
    <button>Cambiar Visibilidad</button>
</form>


<!-- Cerrar Sesion -->
<form action="/desarrollo_servidor/Showcooking/public/index.php/cocinero/cerrarSesion" method="POST">
    <h3>Cerrar Sesión</h3>
    <button>Cerrar Sesión</button>
</form>