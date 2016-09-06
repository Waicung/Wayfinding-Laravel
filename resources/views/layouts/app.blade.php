<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Wayfinding')}}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <script type="text/javascript">
            window.Laravel = <?php echo json_encode([
                'crsfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        <nav class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

               <!-- Branding Image -->
               <a class="navbar-brand" href="{{ url('/') }}">
                   {{ config('app.name', 'Laravel') }}
               </a>
           </div>

           <div class="collapse navbar-collapse" id="myNavbar">
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
                               <li>
                                   <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                       Logout
                                   </a>

                                   <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                       {{ csrf_field() }}
                                   </form>
                               </li>
                           </ul>
                       </li>
                   @endif
               </ul>
           </div>
       </div>
   </nav>

   @yield('content')

   <!-- Scripts -->
   <script src="/js/app.js"></script>
</body>
</html>
