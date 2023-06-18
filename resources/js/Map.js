/**FUNCION LoadSprite de Kaboom
 * Primer parametro = "nombre que se le asigna a la imagen cargada"
 * Segundo parametro = "Ruta de la imagen".
 * IMPORTANTE!! Es importante destacar que cargar una imagen con loadSprite no la muestra automáticamente en el juego.
 */
export function loadMap(map) {
    console.log(map);
    const spritemap = map.match(/mapSprite:\s*(\S+)/)[1];
    const numberSprite = map.match(/NumberSprites:\s*(\S+)/)[1];


    console.log(spritemap);
    console.log(numberSprite);

    loadSprite("background-sheet", spritemap, {
        sliceX: numberSprite,
        sliceY: 1,
        anims: {
          "default": {
            from: 0,
            to: numberSprite - 1,
            speed: 14,
            loop: true
          }
        }
      });

      const groundSprites = {
        "ground-golden": { x: 16, y: 0, width: 16, height: 16 },
        "deep-ground": { x: 16, y: 32, width: 16, height: 16 },
        "ground-silver": { x: 150, y: 0, width: 16, height: 16 }
      };

      loadSpriteAtlas("img/assets/oak_woods_tileset.png", groundSprites);
}
export function showMap(scaleMap) {
    console.log(scaleMap)
    const background = add([ //Cargamos el sprite de fondo //CREAMOS EL OBJETO BACKGROUND CON ADD, EL CUAL NOS PERMITE AÑADIR LAS IMAGENES CARGADAS ANTERIORMENTE A LA ESCENA
    sprite("background-sheet"), //Asignamos la imagen cargada anteriormente
    scale(scaleMap) //Escalamos el objeto.
]);

    background.play("default"); //EJECUTAMOS LA ANIMACION
}

export function generateFloor() {
    const groundTiles = addLevel([ //Addlevel lo utilizamos para crear y personalizar el formato del suelo o de las baldosas que veremos en el juego.
        "","","","","","","","",
        "", //Lo dejamos vacio lo que significa que aqui no hay baldosas o suelo.
        "------#######-----------",
        "dddddddddddddddddddddddd",
        "dddddddddddddddddddddddd"
        ], {
        tileWidth: 16, //Ancho de cada baldosa.
        tileHeight: 16, // Altura de cada baldosa
        tiles: { //Aqui asignamos cada tecla con un sprite para darle sentido al parametro anterior
            "#": () => [
                sprite("ground-golden"), //Terreno dorado
                area(), //Utilizamos area() para que se detecten colisiones.
                body({isStatic: true}) //Hacemos que la baldosa o el terreno sea estatico
            ],
            "-": () => [
                sprite("ground-silver"), //Terreno plateado
                area(),
                body({isStatic: true}),
            ],
            "d": () => [
                sprite("deep-ground"), //Terreno bajo tierra
                area(),
                body({isStatic: true})
            ]
        }
    })

    groundTiles.use(scale(4)) //Utilizamos use para aplicar una propiedad a todas las baldosas, en este caso scale

    //AÑADIMOS A LA ESCENA DOS LIMITADORES PARA QUE NUESTROS PERSONAJES NO PUEDAN SALIRSE DE ESTA.

   add([ //LIMITADOR IZQUIERDO
    rect(20, 720), //(Ancho, altura) en pixeles del rectangulo
    area(),
    body({isStatic: true}),
    pos(-20,0) // Lo posicionamos fuera de la pantalla visible para que no se vea y haga de limitador
   ])

   add([ //LIMITADOR DERECHO
    rect(20, 720),
    area(),
    body({isStatic: true}),
    pos(1280,0)
   ])
}


