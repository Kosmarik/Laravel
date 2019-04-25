<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">


    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    {{--<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>--}}
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>


    {{--calend--}}

    <link rel='stylesheet' href='../../../node_modules/fullcalendar/dist/fullcalendar.css' />
    {{--<script src='../../../node_modules/jquery/dist/jquery.min.js'></script>--}}
    <script src='../../../node_modules/moment/min/moment.min.js'></script>
    <script src='../../../node_modules/fullcalendar/dist/fullcalendar.js'></script>

    {{--CSS--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">

    {{--Particles--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/particles/particles.css')}}">
    <script src="{{asset('js/particles/particles.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js" defer></script>

</head>
<body>
    <div  id="particles-js"></div>
    <div id="page-wrapper">
    <div id="app">
        <nav class="my-navbar">
            <div class="container">
                @guest
                    <div class="navbar-item">
                        <a title="Login" href="/login">
                            <span class="glyphicon glyphicon-floppy-saved"></span>
                        </a>
                    </div>
                    <div class="navbar-item">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" title="Register">
                                <span class="glyphicon glyphicon-floppy-remove"></span>
                            </a>
                        @endif
                    </div>


                        <li class="nav-item">

                        </li>
                @else
                    <div class="navbar-item">
                        <a title="Home" href="{{ url('/') }}">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </div>
                    <div class="navbar-item">
                        <a title="Tasks" href="{{ url('/tasks') }}">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </a>
                    </div>
                    <div class="navbar-item">
                        <a title="Projects" href="{{ url('/projects') }}">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </a>
                    </div>
                <div class="navbar-item">
                    <a title="Companies for Invoice" href="{{ url('/companies') }}">
                        <span class="glyphicon glyphicon-eur"></span>
                    </a>
                </div>
                @role('admin')
                <div class="navbar-item">
                    <a title="Vocabulary" href="{{ url('/admin') }}">
                        <span class="glyphicon glyphicon-font"></span>
                    </a>
                </div>
                @endrole
                <br>
                {{--Right Nav--}}
                <ul class=" navbar-nav ml-auto text-center">
                    <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="navbar-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{--{{ Auth::user()->name }}--}}
                                <span class="glyphicon glyphicon-user"></span>
                            </a>
                        <div class="dropdown-menu dropdown-menu-right my-drop" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item text-danger " href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            {{--<p class="dropdown-item"></p>--}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </li>
                </ul>
                @endguest
            </div>
        </nav>

        <main class="py-4" class="paddings">
                @yield('content')
        </main>
    </div>
    </div>
</body>
</html>
