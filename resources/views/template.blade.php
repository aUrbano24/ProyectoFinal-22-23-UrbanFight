       <!DOCTYPE html>
       <html lang="en">
       <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('img/menu/favicon.ico') }}">
        <script src="https://unpkg.com/kaboom@3000.0.0-beta.2/dist/kaboom.js"></script> <!--LIBRERIA KABOOM.JS!-->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!--LINK TO CSS-->
        <link href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
        <title>UrbanFight</title>
       </head>
       <body>
        <header>
            <div id="header__superior">
                <div id="header__superior__logo">
                    <a href="{{ route('battle') }}"><img src="{{ asset('img/menu/logoOficial.png') }}" alt="Logo"></a>
                </div>

                <div class="search">
                    <div class="dropdown">
                        <button class="dropbtn">Seleccionar idioma</button>
                        <div class="dropdown-content">
                            <a href="locale/en">English</a>
                            <a href="locale/es">Español</a>
                            <a href="locale/cn">Chino</a>
                            <a href="locale/pt">Portugués</a>
                        </div>
                    </div>
                </div>


            </div>

            <div id="app" class="container__menu">

                <div class="menu">
                    <input type="checkbox" id="check__menu">
                    <label for="check__menu" id="label__check" class="icon__menu">
                        <i class="far fa-bars" id="icon" style="color: #ffffff;"></i>
                      </label>
                    <nav>
                        <ul>
                            <li><a href="#" id="selected"></a></li>
                            <li><a href="{{ route('notesIndex') }}">@lang('public.notas del parche')</a></li>
                            @role('admin')
                            <li><a href="{{ route('supportCreate') }}">@lang('public.reportar error')</a></li>
                            @endrole
                            @guest
                            <li><a href="{{ route('supportCreate') }}">@lang('public.reportar error')</a></li>
                            @endguest
                            @role('default')
                            <li><a href="{{ route('supportCreate') }}">@lang('public.reportar error')</a></li>
                            @endrole
                            <li><a href="{{ route('battle') }}" id="selected-makePartida">@lang('public.crear partida')</a></li>
                            <li><a href="{{ route('FightersIndex') }}">@lang('public.luchadores')</a></li>
                            @guest

                            @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt fa-lg"></i>{{-- {{ __('  Login') }} --}}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}"><i class="fas fa-user-plus fa-lg" style="color: #ffffff;"></i>{{-- {{ __('Register') }} --}}</a>
                                </li>
                            @endif
                            <li><a href="#" id="selected"></a></li>
                        @else

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div aria-labelledby="navbarDropdown">

                                    <ul>
                                        <li><a href="{{ route('battle') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                             {{ __('Logout') }}
                                         </a></li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li><a href="#" id="selected"></a></li>

                        @endguest
                        </ul>
                    </nav>
                </div>

            </div>

        </header>
       </body>
       </html>

