<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bigscreen - Administration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="row" id="app">
        <div class="col-md-3 admin_menu">
            <a href="{{url('/administration/accueil')}}">
                <img src="{{asset('img/bigscreen_logo.png')}}" alt="logo" width="100%"></a>
            <ul class="admin_menu_list">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/administration/accueil')}}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('questionnaire.index')}}">Questionnaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reponses.index')}}">Réponses</a>
                </li>
                <li>
                    <a class="logoutButton btn" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </div>
        <div class="col-md-9 admin_content">
            @yield('content')
        </div>
    </div>

@yield('scripts')
</body>
</html>