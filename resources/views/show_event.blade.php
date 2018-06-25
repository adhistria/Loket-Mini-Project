<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<div class="content-header">
    <div class="container">
        <h1 align="center"> Show Event {{$event->title}}</h1>
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