import { loadMap, showMap, generateFloor } from "./Map";
import { loadfighterSprites, makeFighter, handleCollision, declareWinner, createHealthBar, createHealthContainer } from "./Fighter";
import { resetfighterToIdle, configureKeys, resetAfterJump } from "./movement";
import { createCounter } from "./counter";
import { loadViewPort } from "./viewPort";

let name_fighter1, name_fighter2, data_fighter1, data_fighter2, dataSprites_fighter1, dataSprites_fighter2, dataBody_fighter1, dataBody_fighter2, map, scaleMap;
loadViewPort();
//cargar sonidos

loadSound("music", "sounds/music_game.mp3");
loadSound("music2", "sounds/music_game2.mp3");
loadSound("music3", "sounds/music_game3.mp3");
/* loadSound("soundPunch", "sounds/sound_punch.mp3"); */
loadSound("soundYouWin", "sounds/sound_youWin.mp3");
loadSound("soundSword", "sounds/sound_sword.mp3");
loadSound("sound_jump", "sounds/sound_jump.mp3");


//RECOGEMOS LOS DATOS CON JQUERY
$("#restart-lesson").click(function() {
    $("#fighter1").empty();
    $("#fighter2").empty();
    $(".fighter").removeClass("selected");
    $("#create-game").hide();
    $(".fighter").css("background-color", "#c1e2fd"); // Restaurar el color de fondo original

  });

  $("#reset_game").click(function() {
    go("fight") //INICIAR LA ESCENA

  });

$(document).ready(function() {

    $(".fighter").mouseover(function() {
      let nombre = $(this).data("nombre");
      let estadisticas = $(this).data("estadisticas");
      $("#fighters").find(".fighter").not(this).css("opacity", "0.5");
      $(this).css("background-color", "#0074C7");
      $("#container__fighters__selected").append("<div id='tooltip'><h3>" + nombre + "</h3><div id='atributos_estadisticas'><div id='estadisticas_arriba'><p id='Defense'>" + estadisticas.substring(0, estadisticas.indexOf('AttackDamage')) + "</p><p id='AttackDamage'>"+ estadisticas.substring(estadisticas.indexOf('AttackDamage'), estadisticas.indexOf('Attack Speed')) + "</p><p id='AttackSpeed'>"+ estadisticas.substring(estadisticas.indexOf('Attack Speed'), estadisticas.indexOf('Speed Movement')) + "</p></div><div id='estadisticas_abajo'><p id='SpeedMovement'>"+ estadisticas.substring(estadisticas.indexOf('Speed Movement'), estadisticas.indexOf('reach')) + "</p><p id='reach'>Reach" + estadisticas.substr(estadisticas.indexOf('reach') + 5, estadisticas.length - estadisticas.indexOf('reach') - 5) + "</p></div></div></div>");





    });

    $(".fighter").mouseout(function() {
      $("#fighters").find(".fighter").not(this).css("opacity", "1");
      $(this).css("background-color", "");
      $("#tooltip").remove();
    });

    $(".fighter").click(function() {
        $("#tooltip").remove();
      if ($("#fighter1").html() === "") {
        $(this).clone().appendTo("#fighter1");
        /* $(this).off("mouseover mouseout"); */
        $(this).css("background-color", "#0074C7");
      } else if ($("#fighter2").html() === "") {
        $(this).clone().appendTo("#fighter2");
        /* $(this).off("mouseover mouseout"); */
        $(this).css("background-color", "#0074C7");
        $("#create-game").show();

        if ($("#fighter1").html() !== "" && $("#fighter2").html() !== "") {
          $("#create-game-btn").show();
        }

      }
    });

    // Obtener los datos de los personajes seleccionados y pasarlos al juego
    $("#create-game").click(function() {
        //RECOGER DATOS
// Generar un número aleatorio entre 1 y 2
    const randomNumber = Math.floor(Math.random() * 3) + 1;



        $("#battle").css("display", "flex");
        $("#reset_game").show();
        $("#come_back").show();
        $("#mycanvas").show();
        $("#selector").hide();
        $("#mainBattle").hide();
        $("#header__superior").hide();
        $("#main").hide();

        name_fighter1 = $("#fighter1 .fighter").data("nombre");
        name_fighter2 = $("#fighter2 .fighter").data("nombre");

        data_fighter1 = $("#fighter1 .fighter").data("estadisticas");
        data_fighter2 = $("#fighter2 .fighter").data("estadisticas");

        dataSprites_fighter1 = $("#fighter1 .fighter").data("estadisticas2");
        dataSprites_fighter2 = $("#fighter2 .fighter").data("estadisticas2");

        dataBody_fighter1 = $("#fighter1 .fighter").data("estadisticas3");
        dataBody_fighter2 = $("#fighter2 .fighter").data("estadisticas3");

            map = $(".maps").data("map");
            scaleMap = map.match(/Scale:\s*(\S+)/)[1];
            console.log(scaleMap);


        //CARGAMOS DATOS
            loadMap(map);
            // Cargar sprites de los jugadores
            loadfighterSprites(name_fighter1, name_fighter2, dataSprites_fighter1, dataSprites_fighter2);
            scene("fight", () => { //CREACIÓN DE UNA ESCENA QUE HEMOS LLAMADO "FIGHT"
            showMap(scaleMap);
            generateFloor();
            setGravity(1200) //Establecemos una gravedad, mientras mayor sea el numero, mayor sera la gravedad.

            if (randomNumber == 1) {
                play("music");
            } else if (randomNumber == 2){
                play("music2");
            }
            else {
                play("music3");
            }

            const fighter1 = makeFighter(200, 200, dataBody_fighter1, name_fighter1);
            const fighter2 = makeFighter(1000, 200, dataBody_fighter2, name_fighter2);

            resetfighterToIdle(fighter1);
            resetfighterToIdle(fighter2);

            fighter2.flipX = true //Voltear jugador 2

            configureKeys(fighter1, fighter2, data_fighter1, data_fighter2);

            fighter1.onUpdate(() => resetAfterJump(fighter1)) //función de actualización continua para fighter1 que llama a resetAfterJump(fighter1) en cada fotograma del juego para restablecer al jugador después de un salto.
            fighter2.onUpdate(() => resetAfterJump(fighter2)) //Función en bucle para saber si el personaje esta saltando

            const fighter1HealthContainer = createHealthContainer(500, 70, 90, 20);
            const fighter1HealthBar = createHealthBar(fighter1HealthContainer, 498, 66, 498, 70 - 2.5, true);

            const fighter2HealthContainer = createHealthContainer(500, 70, 690, 20);
            const fighter2HealthBar = createHealthBar(fighter2HealthContainer, 498, 66, 2.5, 2.5, false);

            let gameOver = false;
            //CONTADOR
            const count = createCounter();
            const winningText = add([
                text(""),
                anchor("center"),
                pos(center())
              ]);

              //Utilizamos Setinterval para realizar la funcion cada 1000 ms o 1 segundo.
            const countInterval = setInterval(() => {
                if (count.timeLeft === 0) { //Si el contador ha llegado a 0...
                    clearInterval(countInterval) //Detenemos la ejecucion y evitamos que el tiempo siga en reducción.
                    declareWinner(winningText, fighter1, fighter2) //Declaramos ganador
                    gameOver = true //Indicamos que el juego ha finalizado

                    return //Salimos de la función siempre sin hacer nada excepto cuando el contador es 0 que antes hacemos el condicional.
                }
                count.timeLeft-- //Reducimos en uno el contador
                count.text = count.timeLeft //Actualizamos el contador
            }, 1000)



            onKeyDown("enter", () => gameOver ? go("fight") : null) //Si el game esta acabado, al pusar enter vuelves a jugar


            //BARRAS DE VIDA JUGADOR 1 y 2
            if (count.timeLeft > 0) {
                fighter1.onCollide(fighter2.id + "attackHitbox", handleCollision(fighter1, fighter1, fighter2, fighter1HealthBar, 0.75, easings.easeOutQuart, gameOver, countInterval, winningText, data_fighter1, data_fighter2));

                fighter2.onCollide(fighter1.id + "attackHitbox", handleCollision(fighter2, fighter1, fighter2, fighter2HealthBar, 0.75, easings.easeOutQuart, gameOver, countInterval, winningText, data_fighter2, data_fighter1));
                }


            //GOLPES Y REDUCIÓN DE VIDA JUGADOR

            });

            go("fight") //INICIAR LA ESCENA
    });
});




    //YA TENEMOS TODAS LAS IMAGENES QUE VAMOS A UTILIZAR CARGADAS, AHORA ES EL TURNO DE MOSTRARLAS POR PANTALLA.







