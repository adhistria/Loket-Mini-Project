@extends('main.app')
@section('title','Dashboard')
@section('header-title','Welcome To Loket Mini Project')
@section('content-body')

    @if(count($events)==0)
        <div align="center">
            <h4>There's No Event</h4>
            <h5> Create You're Event <a href="{{route('get_event')}}">Here</a></h5>
        </div>
    @else
        <h3 align="center">All Event</h3>
        @foreach($events as $event)
            <div class="card-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$event->title}}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$event->description}}</p>
                        <a href="{{URL('/tweet/'.$event->id)}}" class="btn btn-primary btn-sm  pull-right" style="margin-right: 5px">Post To Twitter</a>
                        <a href="{{url('/event/'.$event->id.'/ticket')}}" class="btn btn-success btn-sm pull-right" style="margin-right: 5px">Show Tickets</a>
                        <a href="{{url('/event/'.$event->id)}}" class="btn btn-info btn-sm pull-right" style="margin-right: 5px">Detail Event</a>
                    </div>
                </div>
            </div>

        @endforeach
    @endif
@endsection

