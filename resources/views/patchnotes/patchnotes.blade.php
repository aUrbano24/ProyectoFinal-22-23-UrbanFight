    @extends('template');
    @php
        use Carbon\Carbon;
    @endphp

    <div id="notespatch">
        @role('admin') <!--SOLO PARA ADMINISTRADORES!-->
        <main class="d-flex justify-content-center">
            <div class="card w-75 mb-3" id="cb-notepatch">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($mensaje = Session::get('error'))
                                <div class="alert alert-success" role="alert">
                                    {{ $mensaje }}
                                </div>
                            @endif

                            @if ($mensaje = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ $mensaje }}
                              </div>
                            @endif

                        </div>
                    </div>
                  <h5 class="card-title">@lang('public.ADMINISTRARNOTASDELPARCHE')</h5>
                  <p>
                    <a href="{{route("notesCreate")}}" class="btn btn-primary"> <span class="far fa-plus-circle"></span>@lang('public.AgregarNota')</a>
                  </p>
                  {{-- @php
                      print_r($data);
                  @endphp --}}
                  <p class="card-text">
                    <div class="table table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <th>@lang('public.Titulo')</th>
                                <th>@lang('public.Descripcion corta')</th>
                                <th>@lang('public.Descripcion larga')</th>
                                <th>@lang('public.Fecha')</th>
                                <th>@lang('public.Visualizar')</th>
                                <th>@lang('public.Editar')</th>
                                <th>@lang('public.Eliminar')</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$item->title}}</td>
                                        <td>{{ Str::limit($item->short_Description, 45, '...')}}</td>

                                        <td>{{ Str::limit($item->long_Description, 60, '...')}}</td>
                                        <td>{{Carbon::parse($item->date)->format('d-m-Y') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNotes{{$item->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style>
                                                    <path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"/>
                                                </svg>
                                            </button>
                                        </td>
                                        <td>
                                            <form action="{{route("notesEdit",$item->id)}}" method="GET">
                                                <button class="btn btn-warning btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#454545}</style>
                                                        <path d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route("notesShow",$item->id)}}" method="GET">
                                                <button class="btn btn-danger btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style>
                                                        <path d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modalNotes{{$item->id}}" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header ">
                                            <h1 class="modal-title fs-5 d-flex justify-content-center" id="modalNotes">{{$item->title}}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <p>{{$item->short_Description}}</p>
                                            <hr>
                                            <p>{{$item->long_Description}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {{$data->links()}}
                        </div>
                    </div>
                  </p>
                </div>
              </div>
            </main>
              @endrole

              @role('default') <!--SOLO PARA DEFAULT!-->
              <main id="mainPatchnotes">
                @foreach ($data as $item)
                    <div class="card cardPatchnotes" style="width: 50rem;">
                        @if (($item->image !== null))
                            <img src="{{ asset($item->image) }}" class="card-img-top" alt="..." style="height: 35rem">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">{{$item->title}}</h4>
                            <p class="card-text">{{ Str::limit($item->short_Description, 200, '...')}}</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNotes{{$item->id}}">
                                @lang('public.Abrir')
                            </button>

                        </div>
                    </div>
                    <div class="modal fade" id="modalNotes{{$item->id}}" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header ">
                            <h1 class="modal-title fs-5 d-flex justify-content-center" id="modal">{{$item->title}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            @if (($item->image !== null))
                                <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                            @endif
                            <hr>
                            <p>{{$item->short_Description}}</p>
                            <p>{{$item->long_Description}}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </main>
              @endrole

            @guest <!--SOLO PARA NO REGISTRADOS!-->
                <main id="mainPatchnotes">
                    @foreach ($data as $item)
                        <div class="card cardPatchnotes" style="width: 50rem;">
                            @if (($item->image !== null))
                                <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title">{{$item->title}}</h4>
                                <p class="card-text">{{ Str::limit($item->short_Description, 200, '...')}}</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNotes{{$item->id}}">
                                    @lang('public.Abrir')
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="modalNotes{{$item->id}}" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header ">
                                <h1 class="modal-title fs-5 d-flex justify-content-center" id="modal">{{$item->title}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                @if (($item->image !== null))
                                    <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                                @endif
                                <hr>
                                <p>{{$item->short_Description}}</p>
                                <p>{{$item->long_Description}}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('public.Cerrar')</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </main>
            @endguest
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
