@extends('main.app')
@section('title','Event')
@section('header-title','Add and Update Event')
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
                            <div class="form-group">
                                <label for="input_name" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input_title" placeholder="Event Name" name = "title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_address" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" id="input_description" placeholder="Event Description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location_id" class="col-sm-2 control-label">Location</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="location_id">
                                        @foreach($locations as $location)
                                            <option value="{{$location->id}}">{{$location->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-info center">Update Event</button>
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
                    <form class="form-horizontal"  route="{{'add_event'}}" method="POST" >
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="input_name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input_title" placeholder="Event Name" name = "title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_address" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" id="input_description" placeholder="Event Description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location_id" class="col-sm-2 control-label">Location</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="location_id">
                                        {{--<option selected>Choose Loation</option>--}}
                                        {{--<option selected>Choose Loation</option>--}}
                                        @foreach($locations as $location)
                                            <option value="{{$location->id}}">{{$location->name}}</option>
                                        @endforeach
                                    </select>
                                    {{--<input type="text" class="form-control" id="inputPassword3" placeholder="Address" name="location_id">--}}
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default center">Add Event</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="table_header">
            <h3>Index </h3>
            <div class="pull-right box-tools">
                <a data-target="#store_modal" data-toggle="modal" role="button" class="btn btn-md btn-primary"  href="#myModal" >Add New</a>
            </div>

        </div>
        <div class="table-wrapper">
            <table id="event_data" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr >
                        <td align="center">{{$event->title}}</td>
                        <td align="center">{{$event->description}}</td>
                        <td align="center">{{$event->location->name}}</td>
                        <td align="center"><a
                                    href="#"
                                    data-target="#update_modal"
                                    data-toggle="modal"
                                    data-title="{{ $event->title}}"
                                    data-description="{{ $event->description}}"
                                    data-idevent="{{$event->id}}"
                                    data-idlocation="{{$event->location_id}}"
                                    id = "open-modal"
                                    role = "button"
                                    class="btn btn-md btn-primary"
                            >
                                Edit
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
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
            $('#event_data').DataTable();
        } );
        $(document).on("click", "#open-modal", function () {
            var title = $(this).data('title');
            var description= $(this).data('description');
            var location_id= $(this).data('idlocation');
            var event_id= $(this).data('idevent');
            $(".modal-body #input_title").val(title);
            $(".modal-body #input_description").val(description);
            $(".modal-body select").val(location_id);
            $('#form_update').attr('action', "/event/"+event_id);
        });
    </script>
@endsection

