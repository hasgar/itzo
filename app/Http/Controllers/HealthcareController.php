<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
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
use App\Area;
use Auth;
use Sentinel;
use Carbon;
class HealthcareController extends Controller
{
    public function selectHealthcare(Request $request) {
      $search = "0";
        if( States::where('id',$request['state'])->count() > 0 && Cities::where('id',$request['city'])->count() > 0 && Types::where('id',$request['type'])->count() > 0) {
        $healthcare_types = HealthcareTypes::where('type_id',$request['type'])->pluck('healthcare_id');
        if (isset($request["search"])) {
          $search  = $request["search"];
          $healthcare = Healthcare::where('city_id', $request['city'])->where('is_approved', 1)->where('status', 1)->whereIn('id', $healthcare_types)->with(['rating','city','photo'])->where('payment_done', 1)->where('is_verified', 1)->where('name', 'LIKE', '%'.$request["search"].'%')->orderBy('name', 'asc')->get();
        } else {
        $healthcare = Healthcare::where('city_id', $request['city'])->where('is_approved', 1)->where('status', 1)->whereIn('id', $healthcare_types)->with(['rating','city','photo'])->where('payment_done', 1)->where('is_verified', 1)->orderBy('name', 'asc')->get();
      }
        $states = States::where('country_id',101)->get();
        $cities = Cities::where('state_id',$request['state'])->get();
        $types = Types::all();
        $state_sel = States::where('id',$request['state'])->get()[0];
        $fecilities = Fecilities::all();
        $city_sel = Cities::where('id',$request['city'])->get()[0];
        $type_sel = Types::where('id',$request['type'])->get()[0];
        $fec = "";
        if(count($healthcare) < 1) {
            return view('public.noHealthcareFound')->with('states',$states)->with('fecilities',$fecilities)->with('fec',$fec)->with('cities',$cities)->with('types',$types)->with('healthcare',$healthcare)->with('city_sel',$city_sel)->with('state_sel',$state_sel)->with('type_sel',$type_sel)->with('search',$search);
        }
        if(Healthcare::where('id',$healthcare[0]['id'])->where('lab',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= "8";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('parking',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= ",9";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('pharmacy',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= ",10";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('wheelchair',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= ",11";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('ambulance',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= ",12";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('inpatient',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= ",13";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('bloodbank',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= ",14";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('fitness',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= ",15";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('yoga',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= ",16";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('massage',1)->count() > 0)
        $fec .= ",17";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('sports',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= ",18";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('insurance',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= ",20";
        if(Healthcare::where('id',$healthcare[0]['id'])->where('tours',1)->where('payment_done', 1)->where('is_verified', 1)->count() > 0)
        $fec .= "19";

        return view('public.selectHealthcare')->with('states',$states)->with('fecilities',$fecilities)->with('fec',$fec)->with('cities',$cities)->with('types',$types)->with('healthcare',$healthcare)->with('city_sel',$city_sel)->with('state_sel',$state_sel)->with('type_sel',$type_sel)->with('search',$search);
        }
        else {

            return redirect('/404');
        }
    }


    public function typeHealthcares(Request $request) {
      $search = "0";

        $request->name = ucfirst($request->name);
        if( $request->name == "Chinese")
            $request->name = "Chinese/Traditional";
        if( Types::where('name',$request->name)->count() > 0 ) {
          $id = Types::where('name',$request->name)->pluck('id')[0];

         $healthcare_types = HealthcareTypes::where('type_id',$id)->pluck('healthcare_id');
         if (isset($request["search"])) {
           $search  = $request["search"];
           $healthcare = Healthcare::where('is_approved', 1)->where('status', 1)->where('payment_done', 1)->where('is_verified', 1)->whereIn('id', $healthcare_types)->with(['rating','city','photo'])->where('name', 'LIKE', '%'.$request["search"].'%')->orderBy('name', 'asc')->get();
           } else {
           $healthcare = Healthcare::where('is_approved', 1)->where('status', 1)->where('payment_done', 1)->where('is_verified', 1)->whereIn('id', $healthcare_types)->with(['rating','city','photo'])->orderBy('name', 'asc')->get();
           }
        $type_sel = Types::where('id',$id)->get()[0];
        /*$states = States::where('country_id',101)->get();
        $cities = Cities::where('state_id',$request['state'])->get();
        $types = Types::all();
        $state_sel = States::where('id',$request['state'])->get()[0];
        $fecilities = Fecilities::all();
        $city_sel = Cities::where('id',$request['city'])->get()[0];
        $type_sel = Types::where('id',$request['type'])->get()[0];
        $fec = "";
        */
        if(count($healthcare) < 1) {
            return view('public.noHealthcaresFound')->with('healthcare',$healthcare)->with('type_sel',$type_sel)->with('search',$search);
        }
        /*if(Healthcare::where('id',$healthcare[0]['id'])->where('lab',1)->count() > 0)
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
        */
        return view('public.selectHealthcares')->with('healthcare',$healthcare)->with('type_sel',$type_sel)->with('search',$search)->with('name',$request->name);
        }
        else {
            return redirect('/404');
        }
    }

    public function showHealthcare(Request $request) {
        $healthcare = Healthcare::where('id', $request->id)->where('is_approved', 1)->where('status', 1)->first();

        $state = States::where('id', $healthcare[0]['state_id'])->first();
            $country = Countries::where('id', $healthcare[0]['country_id'])->first();

        $healthcare_types = HealthcareTypes::where('healthcare_id',$request->id)->with(['types'])->get();

        $ratings = Ratings::where('healthcare_id', $request->id)->with(['user'])->orderBy('id', 'desc')->get();
        $fecilities = HealthcareFecilities::where('healthcare_id', $request->id)->with(['fecility'])->get();
        $photos = Photos::where('healthcare_id', $request->id)->orderBy('name', 'desc')->get();
        return view('public.showHealthcare')->with('healthcare',$healthcare)->with('healthcare_types',$healthcare_types)->with('ratings',$ratings)->with('fecilities',$fecilities)->with('photos',$photos)->with('state',$state)->with('country',$country);

    }
     public function addHealthcare() {
         if (Auth::check()) {
           Auth::logout();
         }
         $countries = Countries::all();
         $areas = Area::all();
         $types = Types::all();

        return view('public.addHealthcare')->with('countries',$countries)->with('types',$types)->with('areas',$areas);
    }
    public function bookHealthcare(Request $request) {
        if (Auth::check()) {
            $user = Sentinel::findById(Auth::user()->id);
        if ($user->inRole('user')){
            $healthcare = Healthcare::where('id', $request->id)->where('payment_done', 1)->where('is_verified', 1)->get();
        return view('public.bookHealthcare')->with('healthcare',$healthcare)->with('done',0);
        }
        }
        return redirect('/signin');

    }

     public function book(Request $request) {

            $healthcare = Healthcare::where('id', $request['id'])->where('payment_done', 1)->where('is_verified', 1)->get();
            $booking = Booking::create(['healthcare_id' => $request['id'],
            'user_id' => Auth::user()->id,
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
$booking = Booking::where('id',$request->id)->first();
        Conversation::create(['user_1_id' => Auth::user()->id,
            'user_2_id' => $booking['healthcare_id'],
            'message' => "Booking #CH".$request->id." Cancelled by ".Auth::user()->name ,
            'ip' => $_SERVER["REMOTE_ADDR"],
            'booking_id' => $request->id,
            'from_user' => 'user',
            ]);
        return redirect('/user/dashboard');
    }

    public function update(Request $data){
      if(!isset($data['food_veg'])) {
          $data['food_veg'] = 0;
      }
      if(!isset($data['food_non_veg'])) {
          $data['food_non_veg'] = 0;
      }
      if(!isset($data['food_organic'])) {
          $data['food_organic'] = 0;
      }
      if(!isset($data['food_personalised'])) {
          $data['food_personalised'] = 0;
      }
      if(!isset($data['fec-lab'])) {
          $data['fec-lab'] = 0;
      }
      if(!isset($data['fec-parking'])) {
          $data['fec-parking'] = 0;
      }
      if(!isset($data['fec-pharmacy'])) {
          $data['fec-pharmacy'] = 0;
      }
      if(!isset($data['fec-wheelchair'])) {
          $data['fec-wheelchair'] = 0;
      }
      if(!isset($data['fec-ambulance'])) {
          $data['fec-ambulance'] = 0;
      }
      if(!isset($data['fec-inpatient'])) {
          $data['fec-inpatient'] = 0;
      }
      if(!isset($data['fec-bloodbank'])) {
          $data['fec-bloodbank'] = 0;
      }
      if(!isset($data['fec-fitnesscentre'])) {
          $data['fec-fitnesscentre'] = 0;
      }
      if(!isset($data['fec-yoga'])) {
          $data['fec-yoga'] = 0;
      }
      if(!isset($data['fec-massage'])) {
          $data['fec-massage'] = 0;
      }
      if(!isset($data['fec-canteen'])) {
          $data['fec-canteen'] = 0;
      }
      if(!isset($data['fec-tours'])) {
          $data['fec-tours'] = 0;
      }
      if(!isset($data['fec-sports'])) {
          $data['fec-sports'] = 0;
      }
      if(!isset($data['fec-insurance'])) {
          $data['fec-insurance'] = 0;
      }
      if(!isset($data['pay-cheque'])) {
          $data['pay-cheque'] = 0;
      }
      if(!isset($data['pay-creditcard'])) {
          $data['pay-creditcard'] = 0;
      }
      if(!isset($data['pay-debitcard'])) {
          $data['pay-debitcard'] = 0;
      }
      if(!isset($data['pay-cash'])) {
          $data['pay-cash'] = 0;
      }
      if(!isset($data['nabh'])) {
          $data['nabh'] = 0;
      }
      if(!isset($data['nabl'])) {
          $data['nabl'] = 0;
      }
      if(!isset($data['iso'])) {
          $data['iso'] = 0;
      }
      if(!isset($data['jci'])) {
          $data['jci'] = 0;
      }
      if(!isset($data['ohsas'])) {
          $data['ohsas'] = 0;
      }
      if(!isset($data['accommodation_single_ac'])) {
          $data['accommodation_single_ac'] = 0;
      }
      if(!isset($data['accommodation_single_non_ac'])) {
          $data['accommodation_single_non_ac'] = 0;
      }
      if(!isset($data['accommodation_shared'])) {
          $data['accommodation_shared'] = 0;
      }
      if(!isset($data['accommodation_general'])) {
          $data['accommodation_general'] = 0;
      }

            $healthcare = Healthcare::where('id',$data['healthcare_id'])->update([
              'name' => $data['name'],
              'email' =>  $data['email'],
              'certificate' =>  $data['certificate'],
              'country_id' => $data['country'],
              'country_code_phone' => $data['country_code_phone'],
              'country_code_mobile' => $data['country_code_mobile'],
              'country_code_fax' => $data['country_code_fax'],
              'state_id' => $data['state'],
              'area' => $data['area'],
              'city_id' => $data['city'],
              'address' => $data['address'],
              'pin' => $data['pin'],
              'mobile' => $data['mobile'],
              'phone' => $data['mobile'],
              'fax' => $data['mobile'],
              'price' => $data['category'],
              'description' => $data['description'],
              'veg' => $data['food_veg'],
              'non_veg' => $data['food_non_veg'],
              'organic' => $data['food_organic'],
              'personalised_diet' => $data['food_personalised'],
              'general_ward' => $data['accommodation_general'],
              'shared' => $data['accommodation_shared'],
              'single_non_ac' => $data['accommodation_single_non_ac'],
              'single_ac' => $data['accommodation_single_ac'],
              'twentyfourseven' => $data['accommodation_single_ac'],
              'mon_from' => $data['working_hours_mon_from'],
              'mon_to' => $data['working_hours_mon_to'],
              'tue_from' => $data['working_hours_tue_from'],
              'tue_to' => $data['working_hours_tue_to'],
              'wed_from' => $data['working_hours_wed_from'],
              'wed_to' => $data['working_hours_wed_to'],
              'thu_from' => $data['working_hours_thu_from'],
              'thu_to' => $data['working_hours_thu_to'],
              'fri_from' => $data['working_hours_fri_from'],
              'fri_to' => $data['working_hours_fri_to'],
              'sat_from' => $data['working_hours_sat_from'],
              'sat_to' => $data['working_hours_sat_to'],
              'sun_from' => $data['working_hours_sun_from'],
              'sun_to' => $data['working_hours_sun_to'],
              'contact_email' => $data['contact_email'],
              'contact_name' => $data['contact_name'],
              'website' => $data['website'],
              'lab' => $data['fec-lab'],
              'departments' => $data['departments'],
              'no_of_beds' => $data['no_of_beds'],
              'bed_range' => $data['bed_range'],
              'parking' => $data['fec-parking'],
              'pharmacy' => $data['fec-pharmacy'],
              'wheelchair' => $data['fec-wheelchair'],
              'canteen' => $data['fec-canteen'],
              'ambulance' => $data['fec-ambulance'],
              'inpatient' => $data['fec-inpatient'],
              'bloodbank' => $data['fec-bloodbank'],
              'fitness' => $data['fec-fitnesscentre'],
              'yoga' => $data['fec-yoga'],
              'massage' => $data['fec-massage'],
              'sports' => $data['fec-sports'],
              'tours' => $data['fec-tours'],
              'insurance' => $data['fec-insurance'],
              'other_fecilities' => $data['other_fecilities'],
              'cash' => $data['pay-cash'],
              'nabh' => $data['nabh'],
              'iso' => $data['iso'],
              'ohsas' => $data['ohsas'],
              'jci' => $data['jci'],
              'nabl' => $data['nabl'],
              'debit_card' => $data['pay-debitcard'],
              'debit_card' => $data['pay-creditcard'],
              'cheque' => $data['pay-cheque'],
              'longtitude' => $data['loc-lon'],
              'latitude' => $data['loc-lat'],
        ]);

        $photos = explode(',',$data['deleted_img']);
$k = 0;
       while($k < count($photos)) {
        Photos::where('id',$photos[$k])->delete();
        $k++;
         }

         $i = 0;
        $pro_pic = '';
if ($data->hasFile('photos')) {
        foreach(Input::file("photos") as $file) {
          $i++;
            $extension = $file->getClientOriginalExtension();
            $destinationPath = 'images/healthcare/';
            $fileName = str_replace(" ","",uniqid('img_'.$healthcare['id'].'_', true).microtime().'.'.$extension);
            if($i == 1)
        $pro_pic = $fileName;
            if($file->move($destinationPath, $fileName))
            {
              $photos = Photos::create([
            'healthcare_id' => $data['healthcare_id'],
            'photo_url' => $fileName,
           ]);
            }
            else {
              return [
                'status' => 'error',
                'message' => 'image_upload',
                'errors' => 'photo upload failed'
            ];
            }
            }

}
            //Healthcare::where('id',$data['healthcare_id'])->update(['pro_pic' => $pro_pic]);
        $types_count = Types::all()->count();
        HealthcareTypes::where('healthcare_id',$data['healthcare_id'])->delete();
        for($i = 1;$i <= $types_count ; $i++) {
        if($data["treatment_type_$i"] != "")
        {
            HealthcareTypes::create([
            'type_id' => $data["treatment_type_$i"],
            'healthcare_id' => $data['healthcare_id']
        ]);
        }
        }

        return redirect('/healthcare/edit');
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
