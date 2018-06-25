<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    public function home(){
        return view('home');
    }

    public function dashboard(){
        $user = Auth::user();
        $events = $user->events;
        return view('dashboard',['events'=>$events]);

    }


}
