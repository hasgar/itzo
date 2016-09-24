<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Healthcare;
use App\Ratings;
use App\Photos;
use App\HealthcareFecilities;
use App\HealthcareTypes;
use App\States;
use App\Cities;
use App\Types;
use App\Fecilities;
use App\Countries;
use App\Booking;
use App\Conversation;
use App\Users;
use Auth;
use Sentinel;
use Carbon;
class HealthcareController extends Controller
{
    public function selectHealthcare(Request $request) {
        
        if( States::where('id',$request['state'])->count() > 0 && Cities::where('id',$request['city'])->count() > 0 && Types::where('id',$request['type'])->count() > 0) {
        $healthcare_types = HealthcareTypes::where('type_id',$request['type'])->pluck('healthcare_id');
        $healthcare = Healthcare::where('city_id', $request['city'])->where('is_approved', 1)->where('status', 1)->whereIn('id', $healthcare_types)->with(['rating','city'])->get();
        $states = States::where('country_id',101)->get();
        $cities = Cities::where('state_id',$request['state'])->get();
        $types = Types::all();
        $state_sel = States::where('id',$request['state'])->get()[0];
        $fecilities = Fecilities::all();
        $city_sel = Cities::where('id',$request['city'])->get()[0];
        $type_sel = Types::where('id',$request['type'])->get()[0];
        $fec = "";
        if(count($healthcare) < 1) {
            return view('public.noHealthcareFound')->with('states',$states)->with('fecilities',$fecilities)->with('fec',$fec)->with('cities',$cities)->with('types',$types)->with('healthcare',$healthcare)->with('city_sel',$city_sel)->with('state_sel',$state_sel)->with('type_sel',$type_sel);
        }
        if(Healthcare::where('id',$healthcare[0]['id'])->where('lab',1)->count() > 0)
        $fec .= "8";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('parking',1)->count() > 0)
        $fec .= ",9";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('pharmacy',1)->count() > 0)
        $fec .= ",10";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('wheelchair',1)->count() > 0)
        $fec .= ",11";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('ambulance',1)->count() > 0)
        $fec .= ",12";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('inpatient',1)->count() > 0)
        $fec .= ",13";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('bloodbank',1)->count() > 0)
        $fec .= ",14";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('fitness',1)->count() > 0)
        $fec .= ",15";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('yoga',1)->count() > 0)
        $fec .= ",16";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('massage',1)->count() > 0)
        $fec .= ",17";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('sports',1)->count() > 0)
        $fec .= ",18";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('insurance',1)->count() > 0)
        $fec .= ",20";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('tours',1)->count() > 0)
        $fec .= "19";
        return view('public.selectHealthcare')->with('states',$states)->with('fecilities',$fecilities)->with('fec',$fec)->with('cities',$cities)->with('types',$types)->with('healthcare',$healthcare)->with('city_sel',$city_sel)->with('state_sel',$state_sel)->with('type_sel',$type_sel);
        }
        else {
            return redirect('/404');
        }
    }

    public function showHealthcare(Request $request) {
        $healthcare = Healthcare::where('id', $request->id)->where('is_approved', 1)->where('status', 1)->get();
        $healthcare_types = HealthcareTypes::where('healthcare_id',$request->id);
        $ratings = Ratings::where('healthcare_id', $request->id)->with(['user'])->orderBy('id', 'desc')->get();
        $fecilities = HealthcareFecilities::where('healthcare_id', $request->id)->with(['fecility'])->get();
        $photos = Photos::where('healthcare_id', $request->id)->get();
        return view('public.showHealthcare')->with('healthcare',$healthcare)->with('healthcare_types',$healthcare_types)->with('ratings',$ratings)->with('fecilities',$fecilities)->with('photos',$photos);
   
    }
     public function addHealthcare() {
         if (Auth::check()) {
           Auth::logout();
         }
         $countries = Countries::all();
         $types = Types::all();
        
        return view('public.addHealthcare')->with('countries',$countries)->with('types',$types);
    }
    public function bookHealthcare(Request $request) {
        if (Auth::check()) {
            $user = Sentinel::findById(Auth::user()->id);
        if ($user->inRole('user')){
            $healthcare = Healthcare::where('id', $request->id)->get();
        return view('public.bookHealthcare')->with('healthcare',$healthcare)->with('done',0);
        }
        }
        return redirect('/signin'); 
         
    }

     public function book(Request $request) {
            
            $healthcare = Healthcare::where('id', $request['id'])->get();
            $booking = Booking::create(['healthcare_id' => $request['id'],
            'user_id' => Users::where('user_id',Auth::user()->id)->pluck('id')[0], 
            'message' => $request['message'], 
            'date' => $request['dateOfBook'],
            'is_confirmed' => 0,
            ]);
            Conversation::create(['user_1_id' => Users::where('user_id',Auth::user()->id)->pluck('id')[0],
            'user_2_id' => $healthcare[0]['id'], 
            'from_user'  => 'user',
            'message' => Auth::user()->name." made a booking for ".Carbon\Carbon::createFromFormat('Y-m-d', $request['dateOfBook'])->format('M d, Y') , 
            'ip' => $_SERVER["REMOTE_ADDR"],
            'booking_id' => $booking['id'],
            ]);
            Conversation::create(['user_1_id' => Users::where('user_id',Auth::user()->id)->pluck('id')[0],
            'user_2_id' => $healthcare[0]['id'], 
            'from_user'  => 'user',
            'message' => $request['message'], 
            'ip' => $_SERVER["REMOTE_ADDR"],
            'booking_id' => $booking['id'],
            ]);
            //booking made email
        return view('public.bookHealthcare')->with('healthcare',$healthcare)->with('done',1);

        
         
    }
    public function cancelBooking(Request $request){
        $booking = Booking::where('id',$request->id)->where('user_id',Auth::user()->id)->update(['is_confirmed' => 3]);
        $booking = Booking::where('id',$request->id)->get();
        Conversation::create(['user_1_id' => Users::where('user_id',Auth::user()->id)->pluck('id')[0],
            'user_2_id' => $booking[0]['healthcare_id'], 
            'message' => "Booking #CH".$request->id." Cancelled by ".Auth::user()->name , 
            'ip' => $_SERVER["REMOTE_ADDR"],
            'booking_id' => $request->id,
            'from_user' => 'user',
            ]);
        return redirect('/user/dashboard');
    }


    public function cancelBook(Request $request){
        $booking = Booking::where('id',$request->id)->where('healthcare_id',Healthcare::where('user_id',Auth::user()->id)->pluck('id')[0])->update(['is_confirmed' => 2]);
        $booking = Booking::where('id',$request->id)->get();
        Conversation::create(['user_1_id' => $booking[0]['user_id'],
            'user_2_id' => $booking[0]['healthcare_id'], 
            'message' => "Booking #CH".$request->id." Cancelled by ".Healthcare::where('id',$booking[0]['healthcare_id'])->pluck('name')[0], 
            'ip' => $_SERVER["REMOTE_ADDR"],
            'booking_id' => $request->id,
            'from_user' => 'healthcare',
            ]);
        return redirect('/healthcare/dashboard');
    }
    public function aCancelBook(Request $request){
        $booking = Booking::where('id',$request->id)->where('healthcare_id',Healthcare::where('user_id',Auth::user()->id)->pluck('id')[0])->update(['is_confirmed' => 4]);
        $booking = Booking::where('id',$request->id)->get();
        Conversation::create(['user_1_id' => $booking[0]['user_id'],
            'user_2_id' => $booking[0]['healthcare_id'], 
            'message' => "Booking #CH".$request->id." Cancelled by Admin",  
            'ip' => $_SERVER["REMOTE_ADDR"],
            'booking_id' => $request->id,
            'from_user' => 'admin',
            ]);
        return redirect('/healthcare/dashboard');
    }

    public function confirmBook(Request $request){
        $booking = Booking::where('id',$request->id)->where('healthcare_id',Healthcare::where('user_id',Auth::user()->id)->pluck('id')[0])->update(['is_confirmed' => 1]);
        $booking = Booking::where('id',$request->id)->get();
        Conversation::create(['user_1_id' => $booking[0]['user_id'],
            'user_2_id' => $booking[0]['healthcare_id'], 
            'message' => "Booking #CH".$request->id." Confirmed by ".Healthcare::where('id',$booking[0]['healthcare_id'])->pluck('name')[0], 
            'ip' => $_SERVER["REMOTE_ADDR"],
            'booking_id' => $request->id,
            'from_user' => 'healthcare',
            ]);
        return redirect('/healthcare/dashboard');
    }
}
