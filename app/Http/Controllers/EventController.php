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
        $user = Auth::user();
        $events = $user->events;
        $locations = Location::all();
        return view('events',['events'=>$events,'locations'=>$locations]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'location_id' => 'integer|required',
            'date' => 'date|required'
        ]);
        $event= new Event();
        $event->title= $request->title;
        $event->description= $request->description;
        $event->user_id = Auth::id();
        $event->location_id = $request->location_id;
        $event->date= $request->date;
        $event->save();
        $request->session()->flash('store', 'Event was successful created!');
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
        $event->date= $request->date;
        $event->save();
        $request->session()->flash('update', 'Event was successful updated!');
        return redirect()->route('get_event');
    }

    public function show($id){
        $event = Event::find($id);
        return view('show_event',['event'=>$event]);
    }

    public function tweet(Request $request,$id){
//        return $id;
//        return time();
        $event = Event::find($id);
        $access_token= $_COOKIE['access_token'];
        $access_token_secret = $_COOKIE['access_token_secret'];
        $connection = new TwitterOAuth(env('CONSUMER_KEY'),env('CONSUMER_SECRET'),$access_token,$access_token_secret);
        $status = "Please see my ".$event->title." here : https://adhiminiproject.000webhostapp.com/event/".$event->id;
        $connection->post("statuses/update", ["status" => $status]);
        $request->session()->flash('tweet', 'You just updated your tweet!');
        return redirect()->route('dashboard');
    }

    public function show_ticket($id){
        $event = Event::find($id);
        return view('show_tickets',['event'=>$event]);
    }
}
