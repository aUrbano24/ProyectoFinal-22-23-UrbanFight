@extends('template')

<main>
    @if ($mensaje = Session::get('errorTitle'))
        <div class="alert alert-danger" role="alert">
            {{ $mensaje }}
        </div>
    @endif

    @if ($mensaje = Session::get('errorDescription'))
        <div class="alert alert-danger" role="alert">
            {{ $mensaje }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @guest
        @php($formTitle = 'Envíanos un reporte')
        @php($formType = 'seccion')
    @endguest

    @role('default')
        @php($formTitle = 'Envíanos un reporte')
        @php($formType = 'type')
    @endrole

    @isset($formTitle)
        <h1 class="form-title">@lang('public.EnviarReporte')</h1>

        <form action="{{ route('supportStore') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf

            <label for="type" class="form-label">@lang('public.Seleccionaeltipodeerror'):</label>
            <select id="type" name="type" required class="form-input">
                <option value="Problemas hardware">@lang('public.Problemashardware')</option>
                <option value="Bugs/Errores">@lang('public.Bugs/Errores')</option>
                <option value="Desequilibrio visual">@lang('public.Desequilibriovisual')</option>
                <option value="Otro4">@lang('public.Otros')</option>
            </select>

            <label for="title" class="form-label">@lang('public.Titulo'):</label>
            <input type="text" name="title" id="title" required class="form-input">

            <label for="description" class="form-label">@lang('public.Descripcion'):</label>
            <textarea name="description" id="description" rows="4" required class="form-input"></textarea>

            <label for="image" class="form-label">@lang('public.imagen'):</label>
            <input type="file" name="image" id="image" accept="image/*" class="form-file-input">
            @error('image')
                <span class="form-error-message">{{ $message }}</span>
            @enderror

            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <br>
            <button type="submit" class="form-submit-button">>@lang('public.Enviarformulario')</button>
        </form>
    @endisset

    @role('admin')
        <div id="reports">
            @foreach ($data as $item)
                <div class="card cardPatchnotes" style="width: 50rem;">
                    @if ($item->image)
                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">{{ $item->title }}</h4>
                        <h4 class="card-text">Tipo: {{ $item->type }}</h4>
                        <p class="card-text">{{ Str::limit($item->description, 200, '...') }}</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNotes{{ $item->id }}">
                            @lang('public.Abrir')
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="modalNotes{{ $item->id }}" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 d-flex justify-content-center" id="modal">{{ $item->title }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $item->title }}</p>
                                @if ($item->image)
                                    <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                                @endif
                                <hr>
                                <p>{{ $item->description }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">@lang('public.Cerrar')</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-12">
                {{ $data->links() }}
            </div>
        </div>
    @endrole
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
