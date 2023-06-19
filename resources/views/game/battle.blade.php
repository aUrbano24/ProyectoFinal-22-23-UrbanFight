@extends('template')
@php
    use Carbon\Carbon;
@endphp

<main id="mainBattle">
    <div id="selector">
        <h2>@lang('public.seleccionDeLuchadores')</h2>
        <div id="fighters">
            <div id="fighters__content">
                @foreach ($data as $item)
                    <div id="fighter" class="fighter" data-nombre="{{$item->name}}"
                        data-estadisticas="Defense: {{$item->defense}} AttackDamage: {{$item->attack}} Attack Speed: {{$item->attackSpeed}} Speed Movement: {{$item->speed_movement}}  reach: {{$item->reach}}"
                        data-estadisticas2="sprites_run: {{$item->sprites_run}} sprites_jump: {{$item->sprites_jump}} sprites_iddle: {{$item->sprites_iddle}} sprites_attack: {{$item->sprites_attack}} sprites_death: {{$item->sprites_death}} Attack_Speed: {{$item->attackSpeed}}"
                        data-estadisticas3="scale: {{$item->scale}}  width: {{$item->width}} height: {{$item->height}}">
                        <img class="image_fighter" src="{{$item->avatar}}" alt="">
                    </div>
                @endforeach
            </div>

            @foreach ($data2 as $item)
            <div id="map{{$item->id}}" class="maps" data-map="Nombre: {{$item->name}}, mapSprite:{{$item->sprite}} NumberSprites: {{$item->numberSprites}} Scale: {{$item->scale}}"">
            @endforeach

            </div>
            <div id="container__fighters__selected">
                <div id="fighters-selected">
                    <div id="fighter1" class="selected"></div>
                    <div id="fighter2" class="selected"></div>
                </div>
            </div>

            <div id="create-game-btn" style="display: none;">
                <button id="create-game" class="btn btn-primary ">@lang('public.crearPatida')</button>
                <button id="restart-lesson" class="btn btn-secondary">@lang('public.Reiniciarelección')</button>
            </div>
        </div>
        </div>


</main>

<div id="battle">
    <canvas id="mycanvas"></canvas>
    <div class="buttons-game">
        <button class="btn btn-primary" id="reset_game">@lang('public.Volveraempezar')</button>
        <a href="{{ route('battle') }}"><button class="btn btn-secondary" id="come_back">@lang('public.Volveratras')</button></a>
        @role('admin')
            <label id="labelHitbox" for="hitbox-checkbox">Mostrar hitbox:</label>
            <input type="checkbox" id="hitbox-checkbox">
        @endrole
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/kaboom@3000.0.0-beta.2/dist/kaboom.js"></script>
<script type="module" src="{{ asset('js/app.js') }}"></script>
