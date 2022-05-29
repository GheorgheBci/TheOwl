<p align="center">
  <img src="https://github.com/GheorgheBci/TheOwl/blob/master/public/img/buho.svg" alt="Sublime's custom image"/>
</p>

# 

The Owl es una biblioteca digital donde puedes encontrar miles de ejemplares de todas las temáticas con un simple click. 

# Diseño de la página web 

https://www.figma.com/file/mz63ZJqAQhAQc42y7s9GJP/ElB%C3%BAhoSabio?node-id=0%3A1

:exclamation: El diseño es una idea de como será la página web, puede cambiar bastante cuando se publique el producto final.

# Despliegue

El proyecto se desplegará en Heroku o en IONOS (En caso de que el dominio no funcione en Heroku) con el dominio www.theowl.es. La base de datos en un principio estará en el mismo servidor que la página.

# Base de datos

Habrá 7 tablas en la base de datos, que son:

	- Usuario: contiene todos los datos de los usuarios que están registrados en la página.
	
	- Rol: indica que rol tiene un usuario (usuario normal, socio o admin).
	
	- Ejemplar: contiene los datos un ejemplar.
	
	- Colección: contiene los datos de una colección.
	
	- Autor: contiene todos los datos de un autor.
	
	- Editorial: contiene los datos de una editorial.
	
	- Detalle_Alquiler: cuando un usuario alquila un ejemplar se guarda en está tabla, en la cual aparece el id del usuario, id del ejemplar alquilado, fecha de alquiler, fecha de devolución y el precio.
	
# Diagrama E/R 
	
![Image text](https://github.com/GheorgheBci/TheOwl/blob/master/TheOwl.drawio.svg)

# Especificación de requisitos 

- Se puede acceder a la página principal y sus apartados sin necesidad de estar logueado, pero a la hora de alquilar un ejemplar si es necesario estar logueado para saber que usuario alquila dicho ejemplar.

- Cuando un usuario se registra, deberá confirmar su cuenta pulsando en el link que le llegará a su cuenta de gmail.

- Habrá 3 tipos de perfiles de usuario:

	- Administrador: Usuario encargado de administrar la página.

	- Usuario normal: Usuario que puede alquilar cualquier ejemplar.

	- Socio: Es lo mismo que el usuario normal, pero este tiene ciertos privilegios como rebajas a la hora de alquilar un ejemplar, puede retrasar la fecha de 	       devolución si aún no ha terminado de leer un ejemplar, etc. Para ser socio tienes que pagar una membresía.

- Cada usuario tendrá un apartado de perfil donde podrá ver sus datos personales, historial de libros alquilados, que libros tiene alquilado en ese momento además de cuántos días le queda para devolverlo.

- El login se hará a través del email del usuario (que será único) y la contraseña.

- Si el usuario no se acuerda de la contraseña habrá una opción para cambiarla por otra. El usuario tendrá que indicar su correo para que le llegue un link donde le llevará a una página para cambiar la contraseña.

- Otra forma de cambiar la contraseña es desde el perfil del usuario. Habrá un apartado donde el usuario podrá cambiar su contraseña, es importante que el usuario sepa su contraseña actual porque habrá que indicarlo para poder cambiar a otra contraseña.

- Tendremos ejemplares que serán los libros que se pueden alquilar. Cada ejemplar tendrá su isbn que es el identificador de dicho ejemplar (está compuesto por 13 dígitos), nombre del ejemplar, epílogo, fecha de publicación y el tema (aventura, horror, ciencia ficción, etc). Además también sabremos a qué editorial pertenece, cuál es su autor si es que lo tiene y en qué colección está.

- A la hora de cuando un usuario alquila un ejemplar se le muestra durante el proceso el precio, la fecha y la fecha de devolución (si el usuario es un socio puede cambiar este campo) del alquiler. Estos datos lo puede ver el usuario siempre si entra en su perfil.

- Cuando es el cumpleaños de un usuario, se le felicitara mediante un correo y además ese día tendrá un descuento si alquila un libro.

- Cuando el usuario procede a leer un ejemplar habrá una animación de un libro abriéndose, además cuando pasamos de página habrá también una animación.

- En la página principal habrá un buscador de ejemplares con el objetivo de agilizar la búsqueda del usuario, además tendrá una búsqueda avanzada por autor, tema, colección, editorial y fecha de publicación. Los resultados tras la búsqueda se podrán ordenar tanto alfabéticamente como por la fecha de publicación.

- El usuario tiene la opción de añadir libros al carrito, que contiene todos los ejemplares que el usuario tiene pensado alquilar junto el precio total de alquilar dichos ejemplares.

- El usuario que sea socio puede darse de baja como tal, seguirá siendo socio hasta la fecha en la que en teoría tiene que pagar la membresía, ya después será un usuario normal.

- Cada ejemplar puede ser puntuado del 1 al 5 por todos los usuarios, luego se hará una media con todos las notas y se mostrará la nota media de dicho ejemplar.

- En el menú principal habrá un apartado llamado WishList, que tendrá la forma de un corazón. El WishList es como una lista donde se guardaran los libros que el usuario le gustaría alquilar alguna vez. Este apartado sólo es accesible si el usuario está logueado.

- En la página donde se visualizan todos los ejemplares, si queremos ver los detalles de un ejemplar, basta con hacer click sobre dicho ejemplar y ocurrirá una animación de como si el ejemplar se abriese. Una vez abierto nos saldrá todos los detalles de ese ejemplar como su autor, epílogo, etc.

# Tecnologías 

- Front-end
	- JavaScript
	- JQuery 
	- AJAX 
	- HTML 
	- CSS

- Back-end 
	- Laravel

# Diario

Semana 18/04/2022 - 24/04/2022

- Resubir de nuevo el proyecto a GitHub por problemas con unos archivos del anterior proyecto
- Añadir los modelos y migraciones del proyecto
- Eliminar de GitHub la migracion users y las vistas home y welcome
- Añadir las vistas login, registro, index y userAccount
- Añadir los estilos y el script.js
- Subir el controlador de la clase Usuario
- Pequeñas modificaciones en algunos archivos

Semana 25/04/2022 - 01/05/2022

- He añadido la función para que el usuario tenga que verificar su cuenta con un link que le llega a su cuenta de gmail para poder usar su cuenta en The Owl
- El usuario tiene la opción de cambiar su foto de perfil (esta función no esta implementada del todo)
- He añadido la parte de contacto y conocenos
- He añadido dos nuevas columnas a la migración usuario, email_verified_at (para comprobar que el usuario ha verificado su cuenta) e imagen_usuario (donde se guardara la imagen que suba el usuario para su perfil)
- He creado el logo de la página (es posible que reciba algunos cambios más)
- Otros cambios 

Semana 02/05/2022 - 08/05/2022

- El usuario puede recuperar la contraseña en caso de que no se acuerde. Esta opción se encuentra en el login
- El usuario también puede cambiar su contraseña en su perfil personal. Aquí solo puede cambiar la contraseña si indica la contraseña actual junto con la nueva contraseña
- El usuario se puede dar de alta como socio
- He añadido una plantilla general para todas las vistas, una plantilla para el login y registro y una plantilla para las vistas de administrador
- He añadido la parte del administrador (Aún no esta del todo terminada)

Semana 09/05/2022 - 15/05/2022

- El diagrama E/R ha sido actualizado, se han añadido nuevos campos a la tabla Usuario
- Tanto las plantillas como las vistas han sido actualizadas
- Todo el css ha sido separado en modulos scss y luego mediante @import se han unido todos en un solo css llamado main.csss

Semana 16/05/2022 - 22/05/2022

- En esta semana he añadido la vista para ver todos los ejemplares, los cuales tiene una animación de un libro abriendose. Cuando el libro se abre hay un link que si lo pulsamos nos lleva a otra vista donde muestran los detalles del ejemplar que hemos seleccionado
- Nuevos campos para la tabla ejemplar que son: idioma, image_book, puntuación y votos. Además el campo isbn ahora es tipo numerico
- El usuario puede puntuar el ejemplar del 1 al 5, luego se muestra la media de todas las puntuaciones para dicho ejemplar
- El usuario tiene en la vista ejemplares un buscador para encontrar más rápido el ejemplar que quiere buscar. Además también tiene la opción de ordenar los ejemplares por el nombre, fecha de publicación y por la puntuación
- Pequeñas modificaciones 

Semana 23/05/2022 - 29/05/2022

- El usuario puede alquilar un ejemplar y además tiene la opción de poder leer dicho ejemplar
- El footer ha sido creado
- Se ha añadido mensajes emergentes cuando se actualiza la contraseña. Se ha mejorado los mensajes de error en los inputs
- Otras modificaciones

# Checkpoint 13/05/2022
https://www.youtube.com/watch?v=5jIgOfQtVXw&ab_channel=GheorgheBush
