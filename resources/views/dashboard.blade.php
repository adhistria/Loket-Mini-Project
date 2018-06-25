@extends('main.app')
@section('title','Locations')
{{--@section('header-title')--}}
@section('header-title','Welcome To Loket Mini Project')
{{--@include('header-title',['header-title'=> 'Loket Mini Project'])--}}
@section('content-body')
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
                    <a href="#" class="btn btn-success btn-sm pull-right" style="margin-right: 5px">Show Tickets</a>
                    <a href="{{url('/event/'.$event->id)}}" class="btn btn-info btn-sm pull-right" style="margin-right: 5px">Detail Event</a>
                </div>
            </div>
        </div>

    @endforeach
@endsection

