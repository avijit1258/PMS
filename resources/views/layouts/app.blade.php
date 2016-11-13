<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Management Software</title>
    <link href={{asset("css/bootstrap.css")}} rel="stylesheet" />

    <link href={{asset("css/bootstrap-theme.css") }} rel="stylesheet" />
    
    <style>
        body {
            font-family: 'Lato';
            
            background-image: url('/image/wood_pattern.png');
        }

        .fa-btn {
            margin-right: 6px;
        }
        .footerholder {
        background: blue;
        height: 60px;
        margin-top: 4px;
        margin-left: 310px;
        width: 700px;
        text-align:center;
        padding:10px;
        color:#ffffff;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-static-top">
        <center>
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img alt="SCRUM" src="/image/LOGO1.png">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    @if(Auth::user())
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Project <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ url('/projects/create') }}">Add new project</a></li>
                        <li><a href="{{ url('/projects') }}">See all projects</a></li>
                        
                       </ul>
                    </li>

                    


                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        </center>
    </nav>

    @yield('content')
    <div class="footerholder">
    <footer>
            <div class="row">
                <p>   All rights reserved By Computer Science & Engineering Discipline</p>
                <p> Khulna University , Khulna-9100</p>
            </div>
    </footer>
    </div>
    <script src={{asset("jquery-1.9.1.min.js") }}></script>
    <script src={{asset("js/bootstrap.min.js") }}></script>
    
</body>
</html>
