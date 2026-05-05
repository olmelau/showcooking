MODIFICACIONES DE LA TAREA
------------------------------------------------


He modificado la tabla "showcooking" añadiendo un campo "publicado" para poder registrar que showcooking está publicado o no.

Una duda que me surge es cómo se qué cocinero ha creado qué showcooking. ---> no existe el campo propietario

He modificado la tabla añadiendo un campo propietario, los shocooking que no tienen propietario, son por defecto el admin.

Para hashear la contraseña utilizaré un método existente en php.




DUDAS:
-----------------------------------------------
 - Para mostrar JSON tengo que mostrar directamente el JSON en el navegador?
 - La aplicación permite enviar JSON en el POST de la API al insertar o actualizar los showcooking?
 - La API donde la guardo? en un a carpeta a parte de API--> api/api.php |  o es un controllador?->apiController.php
 - En caso de que la API no sea un controlador como mandas la peticion a través de un formulario? 
 - Como hago la estructura de carpetas haciendo POO y MVC??? -> es obligatorio el uso de la herencia de clases (
    
        por ejemplo, si instancio una clase dentro de un require_once y luego la necesito en otro sitio?
        Como trabaja el index en ese caso? porque cada vez se llama a un controllador
 
 )



-- Requisitos necesarios en nuestro sistema:

1. Inicio de sesión:
    o Debe existir una página de inicio (login) donde el usuario pueda iniciar sesión
    introduciendo su usuario y contraseña.
    o El sistema debe identificar si el usuario es VisitanteRegistrado, Cocinero o
    Administrador y mostrar el menú correspondiente al rol del usuario.

2. Funcionalidades para el rol "VisitanteRegistrado":
    o Los usuarios registrados podrán ver los videos de showcooking publicados.
    o Podrán dar puntuaciones para valorar los videos (Valoraciones 1 a 5).
    o Podrán tener una lista de favoritos(Cookielist)de los showcooking que más le gustan.
    o Podrán comentar los videos.
    o Los visitantes registrados podrán registrarse por si mismos en la aplicación web
    sin necesidad de que lo haga el Administrador.

3. Funcionalidades para el rol "Cocinero":
    o Los cocineros visualizan y dan de alta videos de showcooking.
    o Tienen posibilidad de actualizar “showcookings”.
    o Deciden si el showcooking y sus recetas asociadas se publican o no, es decir, si
    están o no accesibles para los demás tipos de usuarios.

4. Funcionalidades para el rol "Administrador":
    o Gestiona usuarios (cocineros y visitantes registrados)
        1. Ver usuarios
        2. Crear usuarios
        3. Eliminar usuarios
        4. Modificar perfil de usuarios
    o Gestiona categorías
        1. Ver categorías
        2. Crear categoría
        3. Eliminar categoría
        4. Actualizar categorías