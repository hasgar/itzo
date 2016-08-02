<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Healthcare;
use App\States;
use App\Cities;
use App\Types;
use App\Fecilities;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = States::where('country_id',101)->get();
        $types = Types::all();
        return view('public.home')->with('states',$states)->with('types',$types);
   
    }
}
