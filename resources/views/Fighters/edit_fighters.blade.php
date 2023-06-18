@extends('template');
<main>
    <div class="card w-75 mb-3">
        <h5 class="card-header">@lang('public.Editar luchador')</h5>
        <div class="card-body">
            @if ($mensaje = Session::get('errorTitle'))
                <div class="alert alert-danger" role="alert">
                    {{ $mensaje }}
                </div>
            @endif
            @if ($mensaje = Session::get('errorShortDescription'))
                <div class="alert alert-danger" role="alert">
                    {{ $mensaje }}
                </div>
            @endif
            @if ($mensaje = Session::get('errorLongDescription'))
                <div class="alert alert-danger" role="alert">
                    {{ $mensaje }}
                </div>
            @endif
            @if ($mensaje = Session::get('errorLongDescription2'))
                <div class="alert alert-danger" role="alert">
                    {{ $mensaje }}
                </div>
            @endif
            <p class="card-text">
                <form action="{{route('fightersUpdate', $fighters->id)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <label for="">@lang('public.nombre')</label>
                    <input type="text" name="name" class="form-control" required value="{{$fighters->name}}">
                    <label for="">@lang('public.ataque')</label>
                    <input type="text" name="attack" class="form-control" required value="{{$fighters->attack}}">
                    <label for="">@lang('public.defensa')</label>
                    <input type="text" name="defense" class="form-control" required value="{{$fighters->defense}}">
                    <label for="">@lang('public.Velocidad de Ataque')</label>
                    <input type="text" name="attackSpeed" class="form-control" required value="{{$fighters->attackSpeed}}">
                    <label for="">@lang('public.Velocidad de movimiento')</label>
                    <input type="text" name="speed_movement" class="form-control" required value="{{$fighters->speed_movement}}">
                    <label for="">@lang('public.Alcance')</label>
                    <input type="text" name="reach" class="form-control" required value="{{$fighters->reach}}">
                    <button class="btn btn-warning">@lang('public.actualizar')</button>
                    <a href="{{route("FightersIndex")}}" class="btn btn-info">@lang('public.regresar')</a>
                </form>
            </p>
        </div>
      </div>
</main>
