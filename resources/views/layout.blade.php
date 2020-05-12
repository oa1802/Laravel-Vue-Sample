<!DOCTYPE html>
<html>
   <head>
        <title>Omar's Classic Books - @yield('title')</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
	    <script defer src="{{ mix('js/app.js') }}"></script>
   </head>
   <body>
        @yield('content')
   </body>
   <br/>
   <footer class="text-center">
      © <?php echo date("Y"); ?> Copyright Omar Alkhalili
   </footer>
</html>
