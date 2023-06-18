function restartLesson() {
    $("#fighter1").empty();
    $("#fighter2").empty();
    $(".fighter").removeClass("selected");
    $("#create-game").hide();
    $(".fighter").css("background-color", "gray"); // Restaurar el color de fondo original
  }

  function resetGame() {
    go("fight"); // INICIAR LA ESCENA
  }

  function fighterMouseOver() {
    let nombre = $(this).data("nombre");
    let estadisticas = $(this).data("estadisticas");
    $("#fighters").find(".fighter").not(this).css("opacity", "0.5");
    $(this).css("background-color", "#0074C7");
    $("#container__fighters__selected").append("<div id='tooltip'><h3>" + nombre + "</h3><p>" + estadisticas + "</p></div>");
  }

  function fighterMouseOut() {
    $("#fighters").find(".fighter").not(this).css("opacity", "1");
    $(this).css("background-color", "");
    $("#tooltip").remove();
  }

  function fighterClick() {
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
  }






