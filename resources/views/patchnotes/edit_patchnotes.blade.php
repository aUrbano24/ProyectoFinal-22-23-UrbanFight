@extends('template');
<main>
    <div class="card w-75 mb-3">
        <h5 class="card-header">@lang('public.Editarnotadelparche')</h5>
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
                <form action="{{route('notesUpdate', $patchnotes->id)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <label for="">@lang('public.Titulo')</label>
                    <input type="text" name="title" class="form-control" required value="{{$patchnotes->title}}">
                    <label for="">@lang('public.Descripcion corta')</label>
                    <input type="text" name="short_Description" class="form-control" required value="{{$patchnotes->short_Description}}">
                    <label for="">@lang('public.Descripcion larga')</label>
                    <input type="text" name="long_Description" class="form-control" required value="{{$patchnotes->long_Description}}">
                    <label for="">@lang('public.Fecha')</label>
                    <input type="date" name="date" class="form-control" required value="{{$patchnotes->date}}">
                    <button class="btn btn-warning">@lang('public.actualizar')</button>
                    <a href="{{route("notesIndex")}}" class="btn btn-info">@lang('public.regresar')</a>
                </form>
            </p>
        </div>
      </div>
</main>


