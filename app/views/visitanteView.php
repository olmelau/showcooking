<p>visitante view</p>

<!-- Ver Shocooking -->
<form action="/desarrollo_servidor/Showcooking/public/index.php/api/showcooking" method="GET">
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

<!-- Lista de favoritos -->
<form action="/desarrollo_servidor/Showcooking/public/index.php/api/getFavShowcooking">
    <button>Lista de Favorito</button>
</form>

<!-- Cerrar Sesion -->
<form action="/desarrollo_servidor/Showcooking/public/index.php/visitante/cerrarSesion">
    <button>Cerrar Sesión</button>
</form>

