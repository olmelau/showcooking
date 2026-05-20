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


 Buenas Laura,

por aquí también se puede, la visita era también por ver como ibais. ¿Qué tal las prácticas?

1.- ¿Para mostrar el JSON con los datos, tengo que mostrar directamente el JSON en el navegador?

Si no entiendo mal la pregunta, ¿te refieres al introducir un endpoint verdad? Tipo /api/showcooking. Sí, al introducir la URL (o URI) en el navegador solo se muestra el JSON sin nada más.

2.- ¿La aplicación también permite recibir JSON, o tengo que enviar un array a la hora de insertar o actualizar datos en la bbdd?

Para recibir no lo hace por JSON. Es algo más sencillo y totalmente parecido a un formulario. Cuando estamos con el POST api/showcooking imagínate que estás con un formulario. Los datos van a estar en $_POST['dato'] como si fuera un formulario. 

Lo que sí va a cambiar es la forma en la que se envía la información. En lugar de generarse la petición desde un submit de un formulario como estábamos acostumbrados, ahora la petición se crea manualmente desde el fetch de JS (o Postman). 

3.- ¿La API donde la guardo? Es decir, ¿en una carpeta a parte tipo:
        api/api.php  o es un controlador->apiController.php?

Al final se podría decir que ambas actuarían como controladores (lugar donde se instancia el Model y donde se genera la respuesta/vista (en este caso un JSON). Normalmente viene bien tenerlo en un módulo a parte por razones de modularidad, es decir api/api.php

4.-¿En caso de que la API no sea un controlador como mandas la petición a través de un formulario?

Se llame de una forma u otra la API necesita su controlador. Entonces la forma de llegar sería siempre a través de su endpoint (enlace), si es a través de un formulario el enlace se pone en el action=" ". ¿Es eso a lo que te refierías?

Perfecto, de todas formas cuando entregues el proyecto incluye el script .sql para que cuando te lo corrija pueda importar tu BD y que no haya problema.

Coméntame si se han resuelto las dudas.

Un saludo


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


