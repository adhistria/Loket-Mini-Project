<?php

namespace App\Http\Controllers;
use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(){
        $locations = Location::all();
        return view('locations',['locations'=>$locations]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string'
        ]);
        $location = new Location();
        $location->name= $request->name;
        $location->address= $request->address;
        $location->save();
        return redirect()->route('get_location');
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string'
        ]);
        $location = Location::find($id);
        $location->name= $request->name;
        $location->address= $request->address;
        $location->save();
        return redirect()->route('get_location');
    }
}
