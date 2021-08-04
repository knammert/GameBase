<html>
    <head>
        <title>
            @yield('title', $applicationName)
        </title> 
        <style > 
        td{
            padding-righht: 15px
        }
        </style>
    </head>
    <body>
        <h1>{{$applicationName}}</h1>

        <div class="sidebar">
            @section('sidebar')
                <li><a href="a">...</a></li>
            @show
        </div>

        <div class="container">
            @yield('content')
        </div>
        
    </body>
</html>