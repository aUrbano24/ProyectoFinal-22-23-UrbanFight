export function resetfighterToIdle(fighter) { //Esta función se encarga de restablecer al jugador a su estado de reposo o inactivo.
    //Sprite() => cargar y crear un componente de sprite Use() => aplicar un componente al objeto.
    fighter.use(sprite(fighter.sprites.idle)) //esta línea de código carga y asigna un sprite específico al objeto fighter1 para el estado "idle". Esto significa que cuando el jugador esté en estado de reposo o inactivo, se mostrará el sprite correspondiente.
    fighter.play("idle") //Con esto realizaremos la animacion que este entre parentesis
}

export function run(fighter, speed, flipfighter) {
    if (fighter.health === 0) {
      return;
    }

    const currentAnim = fighter.curAnim();
    const isJumping = fighter.isCurrentlyJumping;

    if (currentAnim !== "run" && !isJumping) {
      fighter.use(sprite(fighter.sprites.run));
      fighter.play("run");
    }

    fighter.move(speed, 0);
    fighter.flipX = flipfighter;
}

export function makeJump(fighter) {
    if (fighter.health === 0) {
        return;
    }

    if (fighter.isGrounded()) {
        const currentFlip = fighter.flipX;
        fighter.jump();
        fighter.use(sprite(fighter.sprites.jump));
        fighter.flipX = currentFlip;
        play("sound_jump");
        fighter.play("jump");
        fighter.isCurrentlyJumping = true;
    }
}



export function resetAfterJump(fighter) {
    if (!fighter.isGrounded() && fighter.isCurrentlyJumping) {
        const currentFlip = fighter.flipX;

        if (currentFlip !== fighter.prevFlipX) {
            fighter.use(sprite(fighter.sprites.jump));
            fighter.flipX = currentFlip;
        }

        fighter.prevFlipX = currentFlip;
    }

    if (fighter.isGrounded() && fighter.isCurrentlyJumping) {
        fighter.isCurrentlyJumping = false;

        if (fighter.curAnim() !== "idle" && fighter.health !== 0) {
            resetfighterToIdle(fighter);
        }
    }
}

export function attack(fighter, excludedKeys, reach) {
    if (fighter.health === 0) {
        return;
    }

    for (const key of excludedKeys) {
        if (isKeyDown(key)) {
            return;
        }
    }

    const hitboxCheckbox = document.getElementById("hitbox-checkbox");
    let opacityHitbox;
    if (hitboxCheckbox == null)
        opacityHitbox = 0;
    else
        opacityHitbox = hitboxCheckbox.checked ? 1 : 0;


    const currentFlip = fighter.flipX;

    if (fighter.curAnim() !== "attack") {
        fighter.use(sprite(fighter.sprites.attack));
        fighter.flipX = currentFlip;

        const slashX = fighter.pos.x + 15;
        const slashXFlipped = fighter.pos.x - 315;
        const slashY = fighter.pos.y - 100;

        const attackHitbox = add([
            rect(reach, 300),
            area(),
            pos(currentFlip ? slashXFlipped : slashX, slashY),
            opacity(opacityHitbox),
            fighter.id + "attackHitbox",
        ]);

        fighter.play("attack", {
            onEnd: () => {
                resetfighterToIdle(fighter);
                fighter.flipX = currentFlip;
                destroy(attackHitbox);
            },
        });
    }
}




export function configureKeys(fighter1 , fighter2, data_fighter1, data_fighter2, gameOver) {

    const movementVelocity1 = parseFloat(data_fighter1.match(/Movement: ([\d.]+)/)[1]);
    const movementVelocity2 = parseFloat(data_fighter2.match(/Movement: ([\d.]+)/)[1]);

    const reach1 = parseFloat(data_fighter1.match(/reach: ([\d.]+)/)[1]);
    const reach2 = parseFloat(data_fighter2.match(/reach: ([\d.]+)/)[1]);
    console.log(reach1)
    console.log(reach2)

    onKeyDown("d", () => {
        run(fighter1, movementVelocity1, false);
    });

      onKeyRelease("d", () => {
        if (fighter1.health !== 0) {
          resetfighterToIdle(fighter1);
          fighter1.flipX = false;
        }
      });

      onKeyDown("a", () => {
        run(fighter1, -movementVelocity1, true);
      });

      onKeyRelease("a", () => {
        if (fighter1.health !== 0) {
          resetfighterToIdle(fighter1);
          fighter1.flipX = true;
        }
      });

      onKeyDown("w", () => {
        makeJump(fighter1);
      });

      onKeyPress("space", () => {
        attack(fighter1, ["a", "d", "w"], reach1);
      });

      onKeyRelease("space", () => {
        destroyAll(fighter1.id + "attackHitbox");
      });

      // Jugador 2
      onKeyDown("right", () => {
        run(fighter2, movementVelocity2, false);
    });

      onKeyRelease("right", () => {
        if (fighter2.health !== 0) {
          resetfighterToIdle(fighter2);
          fighter2.flipX = false;
        }
      });

      onKeyDown("left", () => {
        run(fighter2, -movementVelocity2, true);
      });

      onKeyRelease("left", () => {
        if (fighter2.health !== 0) {
          resetfighterToIdle(fighter2);
          fighter2.flipX = true;
        }
      });

      onKeyDown("up", () => {
        makeJump(fighter2);
      });

      onKeyPress("down", () => {
        attack(fighter2, ["left", "right", "up"], reach2);
      });

      onKeyRelease("down", () => {
        destroyAll(fighter2.id + "attackHitbox");

      });
      onKeyDown("enter", () => gameOver ? go("fight") : null); //Si el juego ha terminado, al presionar Enter volverás a jugar

      //CONTROL MANDO
      onGamepadButtonDown("start", () => gameOver ? go("fight") : null); //Si el juego ha terminado, al presionar Enter volverás a jugar

      onGamepadButtonDown("dpad-right", () => {
        run(fighter1, movementVelocity1, false);
      });

      onGamepadButtonRelease("dpad-right", () => {
        if (fighter1.health !== 0) {
          resetfighterToIdle(fighter1);
          fighter1.flipX = false;
        }
      });


      onGamepadButtonDown("dpad-left", () => {
        run(fighter1, -movementVelocity1, true);
      });

      onGamepadButtonRelease("dpad-left", () => {
        if (fighter1.health !== 0) {
          resetfighterToIdle(fighter1);
          fighter1.flipX = true;
        }
      });

      onGamepadButtonDown("west", () => {
        makeJump(fighter1);
      });

      onGamepadButtonPress("south", () => {
        attack(fighter1, ["dpad-left", "dpad-right", "west"], reach1);
      });

      onGamepadButtonRelease("south", () => {
        destroyAll(fighter1.id + "attackHitbox");
      });
      //_-----------------------------

      // Jugador 2
   /*    onGamepadButtonDown("right", () => {
        run(fighter2, movementVelocity2, false);
      });

      onGamepadButtonRelease("right", () => {
        if (fighter2.health !== 0) {
          resetfighterToIdle(fighter2);
          fighter2.flipX = false;
        }
      });

      onGamepadButtonDown("left", () => {
        run(fighter2, -movementVelocity2, true);
      });

      onGamepadButtonRelease("left", () => {
        if (fighter2.health !== 0) {
          resetfighterToIdle(fighter2);
          fighter2.flipX = true;
        }
      });

      onGamepadButtonDown("up", () => {
        makeJump(fighter2);
      });

      onGamepadButtonPress("down", () => {
        attack(fighter2, ["left", "right", "up"], reach2);
      });

      onGamepadButtonRelease("down", () => {
        destroyAll(fighter2.id + "attackHitbox");
      });
 */
        resetAfterJump(fighter1);
        resetAfterJump(fighter2);
}
