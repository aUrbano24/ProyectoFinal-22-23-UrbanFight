export function loadfighterSprites(fighterName, fighterName2, dataSprites_fighter1, dataSprites_fighter2) {
    const spriteSheetPath = `img/fighters/${fighterName}/${fighterName}_`;
    const spriteSheetPath2 = `img/fighters/${fighterName2}/${fighterName2}_`;
    let spritesRun = [];
    let spritesJump = [];
    let spritesIdle = [];
    let spritesAttack = [];
    let spritesDeath = [];
    let AttackSpeed = [];

    for (let index = 1; index < 3; index++) {
        let dataBody = index === 1 ? dataSprites_fighter1 : dataSprites_fighter2;
        /* console.log(dataBody); */
        spritesRun[index] = parseInt(dataBody.match(/sprites_run: (\d+)/)[1]);
        spritesJump[index] = parseInt(dataBody.match(/sprites_jump: (\d+)/)[1]);
        spritesIdle[index] = parseInt(dataBody.match(/sprites_iddle: (\d+)/)[1]);
        spritesAttack[index] = parseInt(dataBody.match(/sprites_attack: (\d+)/)[1]);
        spritesDeath[index] = parseInt(dataBody.match(/sprites_death: (\d+)/)[1]);
        AttackSpeed[index] = parseInt(dataBody.match(/Attack_Speed: (\d+)/)[1]);
    }

    console.log(spritesRun)
    console.log(spritesJump)
    console.log(spritesIdle)
    console.log(spritesAttack)
    console.log(spritesDeath)
    console.log(AttackSpeed)

    //JUGADOR 1
    loadSprite(`idle-${fighterName}`, `${spriteSheetPath}Idle.png`, {
      sliceX: spritesIdle[1],
      sliceY: 1,
      anims: { "idle": { from: 0, to: spritesIdle[1] - 1, speed: 12, loop: true } }
    });

    loadSprite(`jump-${fighterName}`, `${spriteSheetPath}Jump.png`, {
      sliceX: spritesJump[1],
      sliceY: 1,
      anims: { "jump": { from: 0, to: spritesJump[1] - 1, speed: 2, loop: true } }
    });

    loadSprite(`attack-${fighterName}`, `${spriteSheetPath}Attack.png`, {
      sliceX: spritesAttack[1],
      sliceY: 1,
      anims: { "attack": { from: 0, to: spritesAttack[1] - 1, speed: AttackSpeed[1] } }
    });

    loadSprite(`run-${fighterName}`, `${spriteSheetPath}Run.png`, {
      sliceX: spritesRun[1],
      sliceY: 1,
      anims: { "run": { from: 0, to: spritesRun[1] - 1, speed: 18 } }
    });

    loadSprite(`death-${fighterName}`, `${spriteSheetPath}Death.png`, {
      sliceX: spritesDeath[1],
      sliceY: 1,
      anims: { "death": { from: 0, to: spritesDeath[1] - 1, speed: 10 } }
    });

    //Player 2
    loadSprite(`idle-${fighterName2}`, `${spriteSheetPath2}Idle.png`, {
        sliceX: spritesIdle[2],
        sliceY: 1,
        anims: { "idle": { from: 0, to: spritesIdle[2] - 1, speed: 12, loop: true } }
      });

      loadSprite(`jump-${fighterName2}`, `${spriteSheetPath2}Jump.png`, {
        sliceX: spritesJump[2],
        sliceY: 1,
        anims: { "jump": { from: 0, to: spritesJump[2] - 1, speed: 2, loop: true } }
      });

      loadSprite(`attack-${fighterName2}`, `${spriteSheetPath2}Attack.png`, {
        sliceX: spritesAttack[2],
        sliceY: 1,
        anims: { "attack": { from: 0, to: spritesAttack[2] - 1, speed: AttackSpeed[2] } }
      });

      loadSprite(`run-${fighterName2}`, `${spriteSheetPath2}Run.png`, {
        sliceX: spritesRun[2],
        sliceY: 1,
        anims: { "run": { from: 0, to: spritesRun[2] - 1, speed: 18 } }
      });

      loadSprite(`death-${fighterName2}`, `${spriteSheetPath2}Death.png`, {
        sliceX: spritesDeath[2],
        sliceY: 1,
        anims: { "death": { from: 0, to: spritesDeath[2] - 1, speed: 10 } }
      });
  }

export function makeFighter(posX, posY, dataBody_fighter, id) {
    const scaleFactor = parseFloat(dataBody_fighter.match(/scale: ([\d.]+)/)[1]);
    const width = parseFloat(dataBody_fighter.match(/width: ([\d.]+)/)[1]);
    const height= parseFloat(dataBody_fighter.match(/height: ([\d.]+)/)[1]);

    const fighter = add([
      pos(posX, posY),
      scale(scaleFactor),
      area({ shape: new Rect(vec2(0), width, height) }),
      anchor("center"),
      body({ stickToPlatform: true }),
      {
        isCurrentlyJumping: false,
        health: 500,
        sprites: {
          run: `run-${id}`,
          idle: `idle-${id}`,
          jump: `jump-${id}`,
          attack: `attack-${id}`,
          death: `death-${id}`,
        },
      },
    ]);

    return fighter;
  }

export function declareWinner(winningText, fighter1, fighter2) {
    if (fighter1.health === 0 && fighter2.health === 0 || fighter1.health == fighter2.health) {
        winningText.text = "DRAW!"
        fighter2.health = 0;
        fighter1.health = 0;
    } else if (fighter1.health > 0 && fighter2.health <= 0 || fighter1.health > fighter2.health) {
        fighter2.health = 0;
        winningText.text = "Player 1 win!" //Mensaje por ganar
        fighter2.use(sprite(fighter2.sprites.death))  //Cargar sprite de muerte
        fighter2.play("death") //Realizar animacion
    } else {
        fighter1.health = 0;
        winningText.text = "Player 2 win!"
        fighter1.use(sprite(fighter1.sprites.death))
        fighter1.play("death")
    }
}
//CREAR BARRAS DE VIDA

export function createHealthContainer(width, height, x, y) {
    return add([
        rect(width, height),
        outline(5),
        pos(x, y),
        color(204,0,0)
      ]);
}

export function createHealthBar(content, width, height, posX, posY, isFlipped) {
    return content.add([
        rect(width, height),
        color(102,204,0),
        pos(posX, posY),
        rotate(isFlipped ? 180 : 0)
      ]);
}

//CREAR GOLPES Y REDUCION DE VIDA DE LOS JUGADORES

export function handleCollision(defender, player1, player2, healthBar, Duration, easingFunction, gameOver, countInterval, winningText, data_fighter1, data_fighter2) {
    console.log(defender)
    return () => {
        if (gameOver) {
          return;
        }
        const attackEnemy = parseFloat(data_fighter2.match(/AttackDamage: ([\d.]+)/)[1]);
        const defense = parseFloat(data_fighter1.match(/Defense: ([\d.]+)/)[1]);
        play("soundSword");
        if (defender.health > 0) {
            defender.health -= (attackEnemy - defense);
            console.log(defender.health);
            if (defender.health < 0)
                    defender.health = 0;

            tween(healthBar.width, defender.health, Duration, (val) => {
                healthBar.width = val;
            }, easingFunction);
            }

            if (defender.health === 0) {
            play("soundYouWin");
            clearInterval(countInterval);
            declareWinner(winningText, player1, player2);
            gameOver = true;
            }
        };
}





