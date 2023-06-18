@extends('template')
<main id="fighters_show">
    @foreach ($data as $item)
        <div class="card cardFighter">
            <div class="character">
                <img src="{{$item->avatar}}" alt="Personaje">
                <h3 class="character_name">{{$item->name}}</h3>
            </div>
            <div class="stats">
                <div class="stat">
                    <div class="label">@lang('public.ataque')({{$item->attack}})</div>
                    <div class="bar">
                        <div class="fill fillAtaque" style="width: {{$item->attack/3}}%; max-width: 100%"></div>
                    </div>
                </div>
                <div class="stat">
                    <div class="label">@lang('public.defensa')({{$item->defense}})</div>
                    <div class="bar">
                        <div class="fill fillDefense" style="width: {{$item->defense}}%; max-width: 100%"></div>
                    </div>
                </div>
                <div class="stat">
                    <div class="label">@lang('public.Velocidad de Ataque')({{$item->attackSpeed}})</div>
                    <div class="bar">
                        <div class="fill fillAtackSpeed" style="width: {{$item->attackSpeed}}%; max-width: 100%"></div>
                    </div>
                </div>
                <div class="stat">
                    <div class="label">@lang('public.Velocidad de movimiento')({{$item->speed_movement}})</div>
                    <div class="bar">
                        <div class="fill fillMovementSpeed" style="width: {{$item->speed_movement/13}}%; max-width: 100%"></div>
                    </div>
                </div>
                <div class="stat">
                    <div class="label">@lang('public.Alcance')({{$item->reach}})</div>
                    <div class="bar">
                        <div class="fill fillReach" style="width: {{$item->reach/6}}%; max-width: 100%"></div>
                    </div>
                </div>
            </div>

            @guest
            @elseif (Auth::user()->hasRole('admin'))
                <form action="{{route("fightersEdit",$item->id)}}" method="GET">
                    <button class="btn btn-primary">@lang('public.Editar Estadisticas')</button>
                </form>
            @endif
        </div>
    @endforeach
</main>

