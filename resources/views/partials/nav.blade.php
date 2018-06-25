<nav class="navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Mini Project</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{route('dashboard')}}">Home</a></li>
                <li><a href="{{route('get_event')}}">Event</a></li>
                <li><a href="{{route('get_location')}}">Location</a></li>
                <li><a href="{{route('get_ticket')}}">Ticket</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a>Hi {{Auth::user()->name}}</a></li>
                <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                </li>
            </ul>
        </div>

    </div>
</nav>
