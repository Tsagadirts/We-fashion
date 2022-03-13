<html>

    <head>
        <title>App Name - We Fashion</title>
    </head>

    <body>
        @section('sidebar')
            This is the master sidebar.
        @show
 
        <div class="container">
            <nav>
                @include('menu.index')
            </nav>
            @yield('content')
        </div>
    </body>

</html>