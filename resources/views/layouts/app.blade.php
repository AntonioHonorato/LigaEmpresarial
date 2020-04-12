
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="/css/iziToast.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LigaEmpresarial</title>

    @yield('style')

</head>
<body>
    <div class="ui container">
            <div class="ui inverted menu">
                    <a class="active item" href="/grupos">
                      Grupos
                    </a>
                    <a class="item" href="/equipos">
                      Equipos
                    </a>
                    <a class="item" href="/jugadores">
                      Jugadores
                    </a>
                  </div>
    </div>
</br>
    @yield('content')
    
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/iziToast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    @yield('js')
    
</body>
</html>