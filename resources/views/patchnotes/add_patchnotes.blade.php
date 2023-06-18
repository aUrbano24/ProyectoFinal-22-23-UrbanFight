@extends('template');
<main>
    <div class="card w-75 mb-3">

        <h5 class="card-header">@lang('public.Agregarnuevanotadelparche')</h5>

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
                <form action="{{route('notesStore')}}" method="POST" enctype="multipart/form-data" class="form-container">
                    @csrf <!--TOKEN!-->
                    <label for="">@lang('public.Titulo'):</label>
                    <input type="text" name="title" class="form-control" required>
                    <label for="">@lang('public.Descripcion corta'):</label>
                    <input type="text" name="short_Description" class="form-control" required>
                    @error('short_Description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="">@lang('public.Descripcion larga'):</label>
                    <input type="text" name="long_Description" class="form-control" required>
                    <label for="">@lang('public.Fecha'):</label>
                    <input type="date" name="date" class="form-control" required>
                    <label for="image" class="form-label">@lang('public.imagen'):</label>
                    <input type="file" name="image" id="image" accept="image/*" class="form-control">
                    @error('image')
                        <span class="form-error-message">{{$message}}</span>
                    @enderror
                    <br>
                    <button class="btn btn-primary">@lang('public.agregar')</button>
                    <a href="{{route("notesIndex")}}" class="btn btn-info">@lang('public.regresar')</a>
                </form>
            </p>
        </div>
      </div>
</main>


