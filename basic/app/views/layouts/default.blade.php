<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory --> 

        {{ HTML::style('css/normalize.css', array('media' => 'screen')) }}
        {{ HTML::style('css/main.css?v=2', array('media' => 'screen')) }}
        <!-- Bootstrap -->
        {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}   
        {{ HTML::style('assets/css/datepicker.css', array('media' => 'screen')) }}    
        {{ HTML::style('assets/css/bootstrap-timepicker.min.css', array('media' => 'screen')) }}  
        {{ HTML::style('assets/css/font-awesome.min.css', array('media' => 'screen')) }}  

        {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }} 
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here --> 
        <header>
        </header>
        
        @yield('content')   
        
        <footer>
            <table  align="center">
                <tr>
                    <td>{{ HTML::image("img/logo-avefenix-mini.png", "Editorial AveFénix") }}</td>
                    <td style="text-align:left;">Revista Exclusiva © - Todos los derechos reservados - COPYRIGHT©2013 <br />Editorial Ave Fénix 2010 C.A. RIF: J-29914674-9</td>
                </tr>
            </table> 
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        {{ HTML::script('assets/js/bootstrap.min.js') }} 
        <!-- bootstrap-datepicker --> 
        {{ HTML::script('assets/js/bootstrap-datepicker.js') }}  
        {{ HTML::script('assets/js/locales/bootstrap-datepicker.es.js') }}  
        <!-- bootstrap-timepicker --> 
        {{ HTML::script('assets/js/bootstrap-timepicker.min.js') }}    
        {{ HTML::script('js/plugins.js?v=2') }}
        {{ HTML::script('js/main.js?v=2') }} 

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
