export function loadViewPort() {
/* const screenWidth = window.innerWidth;
  const screenHeight = window.innerHeight; */

  const gameWidth = 1280;
  const gameHeight = 720;

 /*  const scale = Math.min(screenWidth / gameWidth, screenHeight / gameHeight); */

  kaboom({
    width: gameWidth,
    height: gameHeight,
    scale: 1,
    font: "arial",
    canvas: document.querySelector("#mycanvas"),
    debug: false
  });
}
