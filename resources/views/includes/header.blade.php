<!--Dashboard control panel-->
<nav class="navbar navbar-default navbar-fixed-top">
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
            @if (Auth::check())
                <ul class="nav navbar-nav">
                    <li id="wf-panel-tab-home">
                        <a href="{{ url('/home') }}">Dashboard</a></li>
                    <li id="wf-panel-tab-editor">
                        <a href="{{ url('/editor') }}">Editor</a></li>
                    <li id="wf-panel-tab-monitor">
                        <a href="{{ url('/monitor') }}">Monitor</a></li>
                    <li id="wf-panel-tab-recruitment">
                        <a href="{{ url('/recruitment') }}">Recruitment</a></li>
                    <li id="wf-panel-tab-analyser">
                        <a href="{{ url('/analyser') }}">Analyser</a></li>
                </ul>
            @endif
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    {{-- <li><a href="{{ url('/register') }}">Register</a></li> --}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>

                                <a href="{{ url('/profile')}}">Profile</a>

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

<!-- Highlight the currnet tab-->
@if ($active = Route::currentRouteName())
    <script>
        <?php $active = Route::currentRouteName()?>
        document.getElementById("wf-panel-tab-{{ $active }}").className += " active";
    </script>
@endif
