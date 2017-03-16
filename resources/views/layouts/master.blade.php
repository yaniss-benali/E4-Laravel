<!doctype html>
<html lang="fr">
    <head>
        {!! Html::style('assets/css/bootstrap.css') !!}
    </head>
    <!-- LE FOND EST CONFIGURE DANS LE CSS-PERSO.CSS => .BODY -->
    <body class="body">
        
        <!-- LA PAGE SERA CONTENUE ICI -->
        <div class="container">
            <div class="jumbotron" style="box-shadow: 0px 0px 40px 1px black">
                @yield('content')
            </div>
        </div>
        
        {!! Html::script('assets/js/bootstrap.min.js') !!}
        {!! Html::script('assets/js/jquery-2.1.3.min.js')  !!}  
        {!! Html::script('assets/js/ui-bootstrap-tpls.js')  !!}
        {!! Html::script('assets/js/bootstrap.js')  !!}
    </body>
</html>
