@extends('template');
@php
        use Carbon\Carbon;
    @endphp
<main>
    <div class="card w-75 mb-3">
        <h5 class="card-header">@lang('public.EliminarNotadelparche')</h5>
        <div class="card-body">
            <p class="card-text">
                <div class="alert alert-danger" role="alert">
                    @lang('public.SeguroEliminar?')

                   <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <th>@lang('public.Titulo')</th>
                            <th>@lang('public.Descripcion corta')</th>
                            <th>@lang('public.Descripcion larga')</th>
                            <th>@lang('public.Fecha')</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$patchnotes->title}}</td>
                                <td>{{ Str::limit($patchnotes->short_Description, 45, '...')}}</td>
                                <td>{{ Str::limit($patchnotes->long_Description, 65, '...')}}</td>
                                <td>{{Carbon::parse($patchnotes->date)->format('d-m-Y') }}</td>
                            </tr>
                        </tbody>
                   </table>
                   <hr>
                   <form action="{{ route("notesDelete", $patchnotes->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">@lang('public.Eliminar')</button>
                        <a href="{{route("notesIndex")}}" class="btn btn-info">@lang('public.regresar')</a>
                   </form>
                  </div>
            </p>
        </div>
      </div>
</main>


