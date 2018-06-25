<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .content-header{
            display: table;
            width: 100%;
            height: 100%;
            /*position : absolute;*/
            background-color: 		#9fcffb;
            color: white;
            vertical-align:middle;
        }
        *, ::after, ::before {
            box-sizing: border-box;
        }
        .login-wrapper{
            /*padding-top: 290px;*/
            display: table-cell;
            text-align: center;
            vertical-align: middle;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="content-header">
    <div class="login-wrapper">
        <h1 align="center"> Loket Mini Project</h1>
        <h4 align="center"> Welcome To Loket</h4>
        {{--<h6>Login With Your Twitter Account</h6>--}}
        {{--<div class="col-md-1 col-md-offset-5">--}}
        <a href="{{route('login')}}" role="button" class="btn btn-info"><span class="fa fa-twitter" aria-hidden="true" style="font-size:20px"></span>
            Login</a>
        {{--</div>--}}



    </div>
</div>

{{--<button href="{{route('add_event')}}">Add Event</button>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>