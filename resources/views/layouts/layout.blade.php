<!doctype html>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - My blog</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <style>

            .multipleSelection {
                width: 300px;
                background-color: #4e73df;
            }

            .selectBox {
                position: relative;
            }

            .selectBox select {
                width: 100%;
                font-weight: bold;
            }

            .overSelect {
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
            }

            #checkBoxes {
                display: none;
                border: 1px #4e73df solid;
                height: 180px;
                overflow-y: scroll;
            }

            #checkBoxes label {
                display: block;
                font-size: large;
                white-space: nowrap;
                padding: 8px;
            }

            #checkBoxes label:hover {
            // background-color: #4e73df;
                background-color: #60A3D9;
            }
        </style>

        @yield('css')
    </head>

    <body>
        <nav class="nav navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> Blog </a>
                <button type="button"
                        class="navbar-toggler"
                        data-bs-toggler="collapse"
                        data-bs-target="#navbar">
                    <span class="navbar-toggler-icon">

                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('articleList')}}"> Articles </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categoryAdd')}}"> Categories </a>
                        </li>

                        @if(\Illuminate\Support\Facades\Auth::check())
                            <li class="nav-item">
                                {{\Illuminate\Support\Facades\Auth::user()->name}}
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}"> Connexion </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

        </nav>

        @yield('content')

        @yield('javascript')
    </body>
</html>
