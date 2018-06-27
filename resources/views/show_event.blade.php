<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<nav class="navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">Mini Project</a>
        </div>
        @if(Auth::check())
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
        @endif
    </div>
</nav>


<div class="content-header">
    <div class="container">
        <h1 align="center"> Event {{$event->title}}</h1>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="card-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$event->title}}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text" style="font-size: 15px; padding-bottom:  10px">{{$event->description}}</p>
                        <table style="width: 100%">
                            {{--<td class="col-md-1"><h4>Location</h4></td>--}}
                            {{--<td class="col-md-6"><h4>{{$event->location->name}}</h4></td>--}}
                            <tr>
                                <td style="width:20%"><h4>Date</h4></td>
                                <td style="width: 80%"><h4>{{$event->date}}</h4></td>
                            </tr>
                            <tr>
                                <td style="width:20%"><h4>Location</h4></td>
                                <td style="width: 80%"><h4>{{$event->location->name}}</h4></td>
                            </tr>
                            <tr>
                                <td style="width:20%"><p>Address</p></td>
                                <td style="width: 80%"><p>{{$event->location->address}}</p></td>
                            </tr>
                        </table>
                        @if(count($event->tickets)==0)
                            <h4>There's no Ticket Available</h4>
                        @else
                            <h4>Tiket</h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td>Type</td>
                                    <td>Price</td>
                                </tr>
                                </thead>
                                @foreach($event->tickets as $ticket)
                                    <tr>
                                        <td><p>{{$ticket->type}}</p></td>
                                        <td><p>Rp. {{$ticket->price}}</p></td>
                                    </tr>
                                @endforeach

                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>