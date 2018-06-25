@extends('main.app')
@section('title','Tickets')
@section('header-title','Add and Update Your Tickets')
@section('content-body')
    <div class="wrapper">
        <div class="modal fade" id="update_modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Data</h4>
                    </div>

                    <form class="form-horizontal"  id="form_update"method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <input type="hidden">
                            <div class="form-group">
                                <label for="input_name" class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input_type" placeholder="Ticket Type" name = "type" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_address" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="input_price" placeholder="Ticket Price" name="price" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location_id" class="col-sm-2 control-label">Event</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="event_id">
                                        @foreach($events as $event)
                                            <option value="{{$event->id}}">{{$event->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary center">Update Ticket</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="modal fade" id="store_modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Data</h4>
                    </div>
                    @if(count($events)==0)
                        <div align="center" style="padding: 2.7rem">
                            <h4>There's No Event</h4>
                            <h5> Create Your Own Event <a href="{{route('get_event')}}">Here</a></h5>
                        </div>
                    @else
                        <form class="form-horizontal"  action="{{route('store_ticket')}}"method="POST">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden">
                            <div class="form-group">
                                <label for="input_name" class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input_type" placeholder="Ticket Type" name = "type" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_address" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="input_price" placeholder="Ticket Price" name="price" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location_id" class="col-sm-2 control-label">Event</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="event_id">
                                        @foreach($events as $event)
                                            <option value="{{$event->id}}">{{$event->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary center">Add Ticket</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>

            </div>
        </div>

        <div class="table_header">
            <h3>Index </h3>
            <div class="pull-right box-tools">
                <a data-target="#store_modal" data-toggle="modal" role="button" class="btn btn-sm btn-primary"  href="#myModal" >Add New</a>
            </div>

        </div>
        <div class="table-wrapper">
            <table id="ticket_data" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Ticket Type</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    @foreach($event->tickets as $ticket)
                    <tr >
                        <td align="center">{{$ticket->event->title}}</td>
                        <td align="center">{{$ticket->type}}</td>
                        <td align="center">{{$ticket->price}}</td>
                        <td align="left">{{$ticket->event->location->name}}</td>
                        <td><a
                                    href="#"
                                    data-target="#update_modal"
                                    data-toggle="modal"
                                    data-type="{{ $ticket->type}}"
                                    data-price="{{ $ticket->price}}"
                                    data-idticket="{{$ticket->id}}"
                                    data-idevent="{{$ticket->event->id}}"
                                    id = "open-modal"
                                    role="button"
                                    class="btn btn-primary"
                            >
                                Edit
                            </a>

                        </td>
                    </tr>
                        @endforeach
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Event Name</th>
                    <th>Location</th>
                    <th>Action</th>
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
        $(document).on("click", "#open-modal", function () {
            var type = $(this).data('type');
            var price= $(this).data('price');
            var event_id= $(this).data('idevent');
            var ticket_id= $(this).data('idticket');
            $(".modal-body #input_price").val(price);
            $(".modal-body #input_type").val(type);
            $(".modal-body select").val(event_id);
            $('#form_update').attr('action', "/ticket/"+ticket_id);
        });
    </script>
@endsection