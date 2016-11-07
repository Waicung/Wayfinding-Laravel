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
            @if (Auth::guest())
                
            @else
                <ul class="nav navbar-nav">
                    <li id="wf-panel-tab-home"><a href="/home">Home</a></li>
                    <li class="dropdown" id="wf-panel-tab-creater">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="/Creater">Creater
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/creater/experiment">New Experiment</a></li>
                            <li><a href="/creater/routes">Route Generator</a></li>
                        </ul>
                    </li>
                    <li class="dropdown" id="wf-panel-tab-monitor">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Monitor
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/monitor/statistics">Statistics</a></li>
                            <li><a href="/monitor/modifier">Modifier</a></li>
                            <li><a href="/monitor/participants">Participants</a></li>
                        </ul>
                    </li>
                    <li class="dropdown" id="wf-panel-tab-recruitment">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="/recruitment">Recruitment
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/recruitment/forms">Forms</a></li>
                            <li><a href="/recruitment/tests">Tests</a></li>
                        </ul>
                    </li>
                    <li id="wf-panel-tab-analyzer"><a href="/analyzer">Analyzer</a></li>
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

                                <a href="{{ url('/home ')}}">Dashboard</a>

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
