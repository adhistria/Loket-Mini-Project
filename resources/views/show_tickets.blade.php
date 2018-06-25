@extends('main.app')
@section('title','Tickets')
@section('header-title','Event '.$event->title)
@section('content-body')
    <div class="wrapper">

        <div class="table_header">
            <h3>Tickets of {{$event->title}}</h3>
        </div>
        <div class="table-wrapper">
            <table id="ticket_data" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Ticket Type</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($event->tickets as $ticket)
                        <tr >
                            <td align="center">{{$ticket->type}}</td>
                            <td align="center">{{$ticket->price}}</td>
                        </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Ticket Type</th>
                    <th>Price</th>
                </tr>
                </tfoot>
            </table>

        </div>

    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#ticket_data').DataTable();
        } );
    </script>
@endsection