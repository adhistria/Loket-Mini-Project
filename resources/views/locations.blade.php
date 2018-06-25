@extends('main.app')
@section('title','Locations')
@section('header-title','Add and Update Location')
@section('content-body')
    <div class="wrapper">
        <div class="modal fade" id="update_modal" role="dialog">
            <div class="modal-dialog">
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
                                <label for="input_name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input_name" placeholder="Nama Tempat" name = "name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_address" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea rows="4" class="form-control" id="input_address" placeholder="Address" name="address" required></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary center">Update Location</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="modal fade" id="store_modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Data</h4>
                    </div>
                    <form class="form-horizontal"  action="{{route("store_location")}}"method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="input_name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input_name" placeholder="Nama Tempat" name = "name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_address" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows=4 id="input_address" placeholder="Address" name="address" required></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary center">Create New Location</button>
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
            <table id="location_data" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($locations as $key => $location)
                    <tr >
                        <td align="center">{{$location->name}}</td>
                        <td align="left">{{$location->address}}</td>
                        <td align="center"><a
                                    href="#"
                                    data-target="#update_modal"
                                    data-toggle="modal"
                                    data-name="{{ $location->name}}"
                                    data-address="{{ $location->address}}"
                                    data-idlocation="{{$location->id}}"
                                    id = "open-modal"
                                    role="button"
                                    class="btn btn-primary btn-md"
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
                    <th>Address</th>
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
            $('#location_data').DataTable();
        } );
        $(document).on("click", "#open-modal", function () {
            var name = $(this).data('name');
            var address = $(this).data('address');
            var location_id= $(this).data('idlocation');
            $(".modal-body #input_name").val(name);
            $(".modal-body #input_address").val(address);
            $('#form_update').attr('action', "/location/"+location_id);
        });
    </script>
@endsection