<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Event;
//use Illuminate\Auth;
use Illuminate\Support\Facades\Auth;
class TicketController extends Controller
{
    public function index(){
        $events = Auth::user()->events;
        return view('tickets',['events'=>$events]);
    }

    public function store(Request $request){
        $request->validate([
            'type' => 'required|string',
            'event_id' => 'required|integer',
            'price' => 'required|integer'
        ]);
        $ticket = new Ticket();
        $ticket->type = $request->type;
        $ticket->event_id= $request->event_id;
        $ticket->price= $request->price;
        $ticket->save();
        return redirect()->route('get_ticket');
    }


    public function update(Request $request,$id){
        $request->validate([
            'type' => 'required|string',
            'event_id' => 'required|integer',
            'price' => 'required|integer'
        ]);
        $ticket = Ticket::find($id);
        $ticket->type = $request->type;
        $ticket->event_id= $request->event_id;
        $ticket->price= $request->price;
        $ticket->save();
        return redirect()->route('get_ticket');
    }
}
