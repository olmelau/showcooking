<!-- Ver Shocooking -->
<form action="/desarrollo_servidor/Showcooking/public/index.php/visitante/verShowcooking" method="GET">
<h3>Ver Showcookking</h3>    
<button>Ver ShowCooking</button>
</form>

<!-- Valorar Showcooking -->
<form action="/desarrollo_servidor/Showcooking/public/index.php/visitante/valorarShowcooking" method="POST">
    <h3>Valorar Showcooking</h3>
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" placeholder="titulo del showcooking">
    <label for="valoracion">Valoracion</label>
    <input type="number" name="valoracion" id="valoracion" min="1" max="5" placeholder="1-5">
    <button>Valorar  ShowCooking</button>
</form>

<!-- Añadir a Favoritos -->
<form action="/desarrollo_servidor/Showcooking/public/index.php/visitante/insertarFavorito" method="POST">
    <h3>Añadir Favorito</h3>
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" placeholder="titulo del showcooking">
    <button>Añadir Favorito</button>
</form>

<!-- Lista de favoritos -->
<form action="/desarrollo_servidor/Showcooking/public/index.php/visitante/verFavoritos">
    <button>Lista de Favoritos</button>
</form>

<!-- Comentar Showcooking -->
<form action="/desarrollo_servidor/Showcooking/public/index.php/visitante/comentarShowcooking" method="POST">
    <h3>Comentar Showcooking</h3>
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" placeholder="titulo del showcooking">
    <label for="comentario">Comentario</label>
    <input type="text" name="comentario" id="comentario">
    <button>Comentar ShowCooking</button>
</form>

<!-- Cerrar Sesion -->
<form action="/desarrollo_servidor/Showcooking/public/index.php/visitante/cerrarSesion" method="POST">
    <button>Cerrar Sesión</button>
</form>

