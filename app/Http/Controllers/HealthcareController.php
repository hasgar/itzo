<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Healthcare;
use App\States;
use App\Cities;
use App\Types;
use App\Fecilities;
use App\Countries;
use Auth;
class HealthcareController extends Controller
{
    public function selectHealthcare(Request $request) {
        if( States::where('id',$request['state'])->count() > 0 && Cities::where('id',$request['city'])->count() > 0 && Types::where('id',$request['type'])->count() > 0) {
        $healthcare = Healthcare::where('city_id', $request['city'])->get();
        $states = States::where('country_id',101)->get();
        $cities = Cities::where('state_id',$request['state'])->get();
        $types = Types::all();
        $state_sel = States::where('id',$request['state'])->get()[0];
        $fecilities = Fecilities::all();
        $city_sel = Cities::where('id',$request['city'])->get()[0];
        $type_sel = Types::where('id',$request['type'])->get()[0];
        return view('public.selectHealthcare')->with('states',$states)->with('fecilities',$fecilities)->with('cities',$cities)->with('types',$types)->with('healthcare',$healthcare)->with('city_sel',$city_sel)->with('state_sel',$state_sel)->with('type_sel',$type_sel);
        }
        else {
            return redirect('/404');
        }
    }

    public function showHealthcare(Request $request) {
        $healthcare = Healthcare::where('id', $request['id'])->get();
        return view('public.showHealthcare')->with('healthcare',$healthcare);
   
    }
     public function addHealthcare() {
         if (Auth::check()) {
           Auth::logout();
         }
         $countries = Countries::all();
        
        return view('public.addHealthcare')->with('countries',$countries);
    }
}
