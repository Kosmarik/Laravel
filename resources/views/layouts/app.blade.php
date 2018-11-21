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
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>


    {{--calend--}}

    <link rel='stylesheet' href='../../../node_modules/fullcalendar/dist/fullcalendar.css' />
    <script src='../../../node_modules/jquery/dist/jquery.min.js'></script>
    <script src='../../../node_modules/moment/min/moment.min.js'></script>
    <script src='../../../node_modules/fullcalendar/dist/fullcalendar.js'></script>




</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel my-navbar">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                   <span class="glyphicon glyphicon-home"></span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class=" navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class=" navbar-nav ml-auto text-center">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/login">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            {{--@can('create task')--}}
                                {{--<li class="nav-item ">--}}
                                    {{--<a class="nav-link text-white" href="{{route('tasks.create')}}">Create New Task</a>--}}
                                {{--</li>--}}
                            {{--@endcan--}}

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right my-drop" aria-labelledby="navbarDropdown">

                                @can('create task', 'edit task')
                                    {{--<li class="nav-item">--}}
                                        <a class="dropdown-item text-danger" href="/tasks">{{__('Tasks')}}</a>
                                    {{--</li>--}}
                                @endcan
                                    <a class="dropdown-item text-danger" href="/projects">{{__('Projects')}}</a>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
