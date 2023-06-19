# URBAN FIGHT
Proyecto final de grado 2022-2023

## Índice
1. [Project requirements](#project-requirements)
2. [Technologies Used](#technologies-used)
3. [Roadmap Game](#roadmap-game)
4. [Data Base](#Data-base)
5. [Explainer Video y Exposition](#explainer-video)



📄#Project requirements📄
-----------------

- [x] 💻**Desarrollo Web en Entorno Cliente**💻
	- [x] Requisitos Básicos
 		- [x] Separación del código en diferentes ficheros.
 		- [x] Cualquier objeto .html, creado en tiempo de ejecución deberá estar integrado en el DOM.
 		- [x] Almacenamiento local para controlar el acceso de diferentes usuarios al a aplicación web.
 		- [x] Añadir algún tipo de interactividad al sitio web.
 		- [x] Permitir un diseño asíncrono del sitio web y hacer peticiones a la BBDD en el servidor.
 
	- [x] Requisitos Adicionales
 		- [x] Si en el sitio web existe la función de eliminar, mover, intercambiar, etc... objetos, hacer uso de una implementación 'drag and drop'.
 		- [x] Modularización del código (import y export)
 		- [x] Generar un comportamiento automatizado y aleatorio del uso de la aplicación web.
 		- [x] Otra funcionalidad adicional.

- [x] 🔌**Desarrollo Web en Entorno Servidor**🔌
	- [x] Requisitos Básicos
 		- [x] Modelo-Vista-Controlador.
 		- [x] Utilizar la versión 8 del framework Laravel.
 		- [x] Utilizar preferentemente Laravel UI con Boostrap como Starter Kit, aunque también podrá emplearse Laravel Breeze con Tailwind CSS.
 		- [x] Almacenamiento local para controlar el acceso de diferentes usuarios a la aplicación web (usuarios visitantes, registrados y administradores).
 		- [x] Correcto control de sesiones y protección de rutas a través de middlewares.
 		- [x] Agrupación de rutas, plantillas, herencia de plantillas, componentes dinámicos, etc.
 		- [x] Paginación
 		- [x] Caracteristicas adicionales.
 		- [x] Seguir estandares de estilo para PHP.
 		- [x] Documentación del código y justificación de las decisiones tomadas.
 		- [x] Utilizar MariaDB o MySQL
 		- [x] Base de datos con mínimo 5 tablas.
 		- [x] Una tabla mínimo para usuarios.
 		- [x] Incluir esquema E/R en el proyecto (README).
 		- [x] La base de datos debe ser creada mediante herramientas del framework (migraciones, seeders y factorías) y no directamente sobre PHPMyAdmin o desde la consola.
 
	- [ ] Requisitos Adicionales
 		- [x] Uso de Breeze (con Tailwind CSS) o Jetstream (con Tailwind CSS o Bootstrap), además de aquellos aspectos del framework que completen los contenidos impartidos y amplíen la funcionalidad de la aplicación.
 		- [x] Correcta utilización del lenguaje.
 		- [ ] Utilización de componentes dinámicos basados en Vue.js y Axios.js para la comunicación asíncrona en background.

- [x] 🚀**Despliegue de Aplicaciones Web**🚀

    - [x] Requisitos Básicos
 		- [x] La aplicación web deberá ser accesible desde internet, es decir, no podrá estar desplegada en maquinas locales.
 		
 	- [x] Requisitos Adicionales	
 	    - [x] Se valorá positivamente que el SGBD utilizado por la aplicación web este alojado en una maquina distinta a la máquina donde este desplegada la aplicación web.
 		- [x] Baleanceador de carga.
 
- [x] 🌈**Diseño de Interfaces Web**🌈
	- [x] Crear Prototipo en Figma
 		- [x] Seleccionar color dominante.
 		- [x] Crea una paleta de colores con el color dominante seleccionado. La paleta podrá ser monocromática, análoga o complementaria.
 		- [x] Selecciona una fuente para el prototipo. Explica la elección de esa fuente.
 		- [x] Crea una combinación armónica con otra fuente, aplicando diversos pesos en la jerarquía visual.
 		- [x] Seleccionar dos colores para la fuente y background, calculando el contraste entre ellos según el estándar WCAG 2.
 		- [x] Aplicar varios ejemplos en vuestra composición de “Equilibrio visual y tensión compositiva”. Explica la elección de esos elementos y qué significado aporta.
 		- [x] El prototipo será diseñado para una resolución de 1920 x 1080, utilizando una rejilla de 12 columnas y para una resolución móvil 360 x 640.
 
	- [x] CSS3
 		- [x] Utilizar CSS3 para dar formato a la interfaz, no se podrá utilizar ningún tipo de Framework tipo Bootstrap, Materialize, UIKit...
 		- [x] El diseño de la interfaz deberá ser “Responsive” utilizando Media Queries, FlexBox y Grid layout.
 		- [x] Utilizar el preprocesador SASS para estructurar los archivos css en un único main.css (main.scss ) con @import a los demás scss (colores, cabecera, pie, cuerpo…).
 		- [x] Utilizar la metodología BEM para la descripción de los selectores, variables...
 	
 	- [x] HTML
 		- [x] Insertar un elemento multimedia de cada tipo: video, sonido, canvas y SVG.
 		- [x] Se podrán utilizar las librerias Chartjs, D3.js, koolChart, Snap.svg o cualquier para incluir gráficas, animaciones, galería de imágenes para canvas o SVG.
 	
	- [x] Utilizar un software tipo inkscape para crear el logo vectorial al cual se le podrá aplicar alguna animación con Snap.svg o anime.js para cubrir el punto anterior.

- [X] 🇺🇸 **Hora Libre Configuración (Ingles)** 🇺🇸
	- [x] Traducir las diferentes interfaces del sitio, permitiendo que el usuario cambie entre idiomas. Los idiomas mínimos contemplados serán: español e inglés. El alumn@ podrá añadir tantos como se desee. No se puede hacer uso de las herramientas de traducción de Google, Chrome, etc...
	- [x] Comentar, documentar y explicar el código en inglés.
	- [ ] Realizar la exposición en inglés. Si el alumn@ se cansa, siempre podrá expresarse en español, con la idea de volver a expresarse en inglés nada más tenga la oportunidad.
 		
 📚#Technologies Used
-----------------
 | **Fronted** | **Backend** | **Others** |
 |-------------|-------------|-------------|
 | JQuery      | PHP          | AWS        |
 | SASS        | MySQL        | GIT        |
 | Kaboom      | Laravel      | Photoshop  |
 | JS          |              | Otros      |
 
<h2 align="center">📈📝Roadmap Game</h2>

- [x] Versión 1.0
  - [x] Crear base de datos.
  - [x] Crear interfaz básica.

- [x] Versión 2.0 
  - [x] Estructurar desarrollo del juego.
  - [x] Generar ViewPort.
  - [x] Diseñar Personaje principal.
  - [x] Diseñar mapa principal.
  - [x] Cargar Elementos audivisuales.
  - [x] Crear Elementos en juego.
  - [x] Desarrollar animaciones.
  - [x] Establecer animación de correr.
  - [x] Establecer animación de salto.
  - [x] Establecer animación de muerte.
  - [x] Establecer animación de ataque.
  - [x] Establecer animación de personaje quieto.
  - [x] Desarrollar interfaz de juego.
  - [x] Generar movimientos básicos.
  - [x] Establecer gravedad y suelo.
  - [x] Establecer barras de vida.
  - [x] Establecer contador.  

- [x] Versión 3.0
  - [x] Establecer hitbox.
  - [x] Detectar colisiones y golpes.
  - [x] Animar barra de vida.
  - [x] Declarar ganador.
  - [x] Desarrollar salto.
  - [x] Detectar cuando el personaje esta en el suelo.
  - [x] Establecer reseteo de salto.
  - [x] Voltear animacion al correr.
  - [x] Correguir Hitbox.
  - [x] Establecer empate.
  - [x] Desabilitar ataque en ciertos puntos del gameplay.
  - [x] Controlar la presión de muchas teclas a la vez.

- [x] Versión 4.0
  - [x] Desarrollar 5 personajes en total.
  - [x] Crear selector de personajes básico.
  - [x] Generar estadisticas adicionales a los personajes.
  - [x] Sincronizar estadísticas con la base de datos.
  - [x] Sincronizar mapa con la base de datos
  - [x] Sincronizar Sprites con la base de datos.
  - [x] Establecer cantidad de sprite a cada personaje de manera automática.
  - [x] Funcionalidad de un mando con el juego.
  - [x] Añadir un alcance de ataque al personaje.
  - [x] Añadir escala para tamaño del personaje.
  - [x] Añadir sonidos al ataque.
  - [x] Añadir sonidos al salto.
  - [x] Añadir musica de juego de forma aleatoria.
 
 - [x] Versión 5.0
    - [x] Arreglar bug declaración de ganador.
    - [x] Arreglar bug cambiar dirección jugador en el aire.
    - [x] Arreglar bug finalización de partida con contador.
    - [x] Parar movimiento cuando se termine el contador.
    - [x] Arreglar bug a la hora de hacer animación de muerte.
    - [x] Posibilidad de cambiar estadisticas sincronizadas con la base de datos.
    - [x] Ver hitbox en modo admin.
    - [x] Arreglar bug al correr con el mando.

 - [x] Versión 6.0
    - [x] Generar avatares para los personajes
    - [x] Mejorar visualmente selector de personajes.
    - [x] Mostrar estadísticas en el selector de personajes.
    - [x] Posibilidad de resetear selección.
    - [x] Botón para volver a jugar partida.
    - [x] Botón para salir de la partida.
 
   <h2 align="center">Data Base</h2>
   ![image](https://github.com/aUrbano24/ProyectoFinal-22-23-UrbanFight/assets/91953243/b2c135cb-104c-4691-9890-9c02190693f8)

  <h2 align="center">Explainer Video</h2>

Video Demostrativo explicando la mayoria de las funciones de la web.
https://youtu.be/hjQDniRGRbo

Exposición:
https://drive.google.com/file/d/1WWuOjxI8q9eLND5EZu1waRgMsbWRexvz/view?usp=sharing
