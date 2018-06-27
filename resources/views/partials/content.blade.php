<div class="content">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="error">
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <p class="alert alert-danger">{{$error}}</p>
                        </div>

                    @endforeach
                @endif

                    @if(Session::has('store'))
                        <div class="alert alert-info alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('store') }}
                        </div>
                    @elseif(Session::has('update'))
                        <div class="alert alert-info alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('update') }}
                        </div>
                    @elseif(Session::has('tweet'))
                        <div class="alert alert-info alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('tweet') }}
                        </div>
                    @endif

            </div>
            @yield('content-body')
        </div>
    </div>
</div>