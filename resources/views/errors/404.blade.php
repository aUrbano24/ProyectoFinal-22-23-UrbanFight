@extends('template')
<main id="mainError">
    <h1 id="tituloerror">ERROR 404</h1>
    <h1 id="tituloerror">¡Game Over!</h1>
    <p id="parrafoError">Parece que te has perdido en el combate.</p>
    <p id="parrafoError">No te preocupes, puedes volver a la acción presionando el botón a continuación:</p>
    <a class="buttonError" href="{{ route('battle') }}">¡Volver a jugar!</a>
</main>

