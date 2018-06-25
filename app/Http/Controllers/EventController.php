<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Location;
use Illuminate\Support\Facades\Auth;
use Abraham\TwitterOAuth\TwitterOAuth;

class EventController extends Controller
{
    //
    public function index(){
        $events = Event::all();
        $locations = Location::all();
        return view('events',['events'=>$events,'locations'=>$locations]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'location_id' => 'integer|required'
        ]);
        $event= new Event();
        $event->title= $request->title;
        $event->description= $request->description;
        $event->user_id = Auth::id();
        $event->location_id = $request->location_id;
        $event->save();
        return redirect('/event');
    }

    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'location_id' => 'integer|required'
        ]);
        $event= Event::find($id);
        $event->title= $request->title;
        $event->description= $request->description;
        $event->user_id = Auth::id();
        $event->location_id = $request->location_id;
        $event->save();
        return redirect()->route('get_event');
    }

    public function show($id){
        $event = Event::find($id);
        return view('show_event',['event'=>$event]);
    }

    public function tweet($id){
        $event = Event::find($id);
        $access_token= $_COOKIE['access_token'];
        $access_token_secret = $_COOKIE['access_token_secret'];
        $connection = new TwitterOAuth(env('CONSUMER_KEY'),env('CONSUMER_SECRET'),$access_token,$access_token_secret);
        $status = "Please see my ".$event->name." here :  localhost:8000/ticket/".$event->id;
        $connection->post("statuses/update", ["status" => $status]);
        return redirect()->route('dashboard');
    }

    public function show_ticket($id){
        $event = Event::find($id);
        return view('show_tickets',['event'=>$event]);
    }
}
