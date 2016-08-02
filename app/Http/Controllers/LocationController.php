<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cities;
use App\States;

class LocationController extends Controller
{
    public function getCities(Request $request){
         return Cities::where('state_id',$request['id'])->get();
    }
    public function getStates(Request $request){
         return States::where('country_id',$request['id'])->get();
    }
}
