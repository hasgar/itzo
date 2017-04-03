<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Sentinel;
use App\Countries;
use App\States;
use App\Cities;
use App\Booking;
use App\Users;
use App\User;
use App\Types;
use App\Healthcare;
use App\Photos;
use App\Conversation;
use App\HealthcareTypes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{

    public function showSignIn() {

        if (Auth::check()) {
            $user = Sentinel::findById(Auth::user()->id);
             if ($user->inRole('admin')){
               return redirect('/admin/dashboard');
            }
            if ($user->inRole('user')){
               return redirect('/user/dashboard');
            }
            if ($user->inRole('healthcare')){
               return redirect('/healthcare/dashboard');
            }
            else {
                return redirect('/');
            }
        }
        return view('public.signin');
    }

    public function showSignUp(){

        if (Auth::check()) {
            $user = Sentinel::findById(Auth::user()->id);
            if ($user->inRole('admin')){
               return redirect('/admin/dashboard');
            }
            if ($user->inRole('user')){
               return redirect('/user/dashboard');
            }
            if ($user->inRole('healthcare')){
               return redirect('/healthcare/dashboard');
            }
            else {
                return redirect('/');
            }
        }
        $countries = Countries::all();

        return view('public.signup')->with('countries',$countries);
    }

    public function dashboard(){
        $booking = Booking::where('user_id',Auth::user()->id)->with(['healthcare'])->orderBy('id','desc')->get();
                return view('user.dashboard')->with('booking',$booking);
    }
     public function chat(Request $request){
        $booking = Booking::where('id',$request->id)->get();
        $chat = Conversation::where('user_1_id',Users::where('user_id',Auth::user()->id)->pluck('id')[0])->where('booking_id',$request->id)->orderBy('id','desc')->get();
                return view('user.chat')->with('booking',$booking)->with('chat',$chat);
    }
    public function chatSend(Request $request){
        if(Booking::where('id',$request['id'])->where('user_id',Users::where('user_id',Auth::user()->id)->pluck('id')[0])->count() > 0){
       Conversation::create(['user_1_id' => Users::where('user_id',Auth::user()->id)->pluck('id')[0],
            'user_2_id' => Booking::where('id',$request['id'])->pluck('healthcare_id')[0],
            'message' => $request['message'] ,
            'ip' => $_SERVER["REMOTE_ADDR"],
            'booking_id' => $request['id'],
            'from_user' => 'user',
            ]);
            return redirect('/user/chat/'.$request['id'].'/sent');
        }
        else {
            return redirect('/noPermission');
        }
    }

    public function userOtp(){
      $health = Users::where('user_id',Auth::user()->id)->first();
      $type = "Email";
          if ($health["country_code"] == "91")
          $type = "Mobile";

              return view('user.otp')->with('type', $type);
        }
        public function healthcareOtp(){


                  return view('healthcare.otp');
            }
            public function paymentPending(){
                      $health = Healthcare::where('user_id',Auth::user()->id)->first();
                      $amount = 1000;
                      if ($health['bed_range'] == "0-50" ) {
$amount = 1000;
                      } else if ($health['bed_range'] == "51-100" ) {
$amount = 2000;
                      } else if ($health['bed_range'] == "101-200" ) {
$amount = 3000;
                      } else if ($health['bed_range'] == "201-300" ) {
$amount = 4000;
                      } else if ($health['bed_range'] == "300+" ) {
$amount = 5000;
                      }
                      $mytime = \Carbon\Carbon::now();
                      $date_from = $mytime->toFormattedDateString();
                      $mytime->addYears(1);
$date_to = $mytime->toFormattedDateString();

                      return view('healthcare.paymentPending')->with('name',$health['name'])->with('amount',$amount)->with('date_from',$date_from)->with('date_to',$date_to);
                }

        public function otpVerification(Request $request){
          if (Users::where('user_id',Auth::user()->id)->first()["OTP"] == $request['otp']) {
            Users::where('user_id', Auth::user()->id)
          ->update(['is_verified' => 1]);
            return redirect('/user/dashboard');
          } else {
                  return view('user.otp')->withErrors(['Wrong OTP, please try again.']);
                }
      }

      public function testMail() {
        $mytime = \Carbon\Carbon::now();
        $date_from = $mytime->toFormattedDateString();
        $mytime->addYears(1);
return $mytime->toFormattedDateString();
        $to = "hasgardee@gmail.com";
$subject = 'Thanks for registering with Chikitzo';
$message = 'Hello asdsd Team,<br>

Thanks for registering with us.<br>

Your OTP is: asdsad<br>

Regards,<br>
Chikitzo Team<br></html>';
$from = 'info@chikitzo.com';


mail($to, $subject, $message);

      }

      public function healthcareOtpVerification(Request $request){
        $healthcare = Healthcare::where('user_id',Auth::user()->id)->first();
        if ($healthcare["OTP"] == $request['otp']) {
          Healthcare::where('user_id', Auth::user()->id)
        ->update(['is_verified' => 1]);
        $to = "info@chikitzo.com";
$subject = 'New Healthcare Registered';
$message = 'Hello,

'.$healthcare["name"].' registered in chikitzo.<br>
Payment mode: '.$healthcare["payment_mode"].'

Regards,
Chikitzo Team';
$from = 'info@chikitzo.com';
mail($to, $subject, $message);


$to = $healthcare["email"];
$subject = 'Chikitzo - Payment pending!';
$message = 'Hello '.$healthcare["name"].' Team,

Thanks for registering with us.

Your payment is pending.

Clear your payment and get your healthcare live on chikitzo.

Regards,
Chikitzo Team';
$from = 'info@chikitzo.com';
mail($to, $subject, $message);

          return redirect('/healthcare/dashboard');
        } else {
                return view('healthcare.otp')->withErrors(['Wrong OTP, please try again.']);
              }
    }


public function noPermission(){
          return view('public.noPermission');
    }
    public function uSuccessfullyRegistered(){
          return view('public.uSuccessfullyRegistered');
    }
    public function hSuccessfullyRegistered(){
          return view('public.hSuccessfullyRegistered');
    }
    public function hDashboard() {

  $booking = Booking::where('healthcare_id',Healthcare::where('user_id',Auth::user()->id)->where('payment_done', 1)->where('is_verified', 1)->pluck('id')[0])->with(['healthcare','user'])->orderBy('id','desc')->get();

      //  $user = User::where('id',$booking[0]['user_id'])->first();

                return view('healthcare.dashboard')->with('booking',$booking);
    }
    public function aDashboard(){
        $booking = Booking::with(['user'])->get();
        return view('admin.dashboard')->with('booking',$booking);
    }
    public function userBookings(Request $request){

        $booking = Booking::where('user_id',$request->id)->get();
        return view('admin.bookings')->with('booking',$booking);
    }
    public function aUsers(){
        $users = Users::with(['bookings'])->get();
        return view('admin.users')->with('users',$users);
    }
    public function aHealthcares(){
        $healthcares = Healthcare::where('is_verified', 1)->orderBy('id', 'desc')->get();
        return view('admin.healthcares')->with('healthcares',$healthcares);
    }
    public function  paymentDoneComplete(Request $request) {
      $user = Healthcare::where('id',$request->id)->update(['payment_done' => 1]);
      $to = $user["email"];
$subject = 'Chikitzo - Payment recieved!';
$message = 'Hello '.$user["name"].' Team,

Thanks for registering with us.

We have received your payment.

Your healthcare is live at chikitzo now!

Regards,
Chikitzo Team';
$from = 'info@chikitzo.com';


mail($to, $subject, $message);
      return redirect('/admin/healthcares');
    }

    public function  verifiedComplete(Request $request) {
      $user = Healthcare::where('id',$request->id)->update(['is_verified' => 1]);

      return redirect('/admin/healthcares');
    }
     public function hChat(Request $request){
        $booking = Booking::where('id',$request->id)->get();
        $chat = Conversation::where('user_2_id',Healthcare::where('user_id',Auth::user()->id)->pluck('id')[0])->where('booking_id',$request->id)->orderBy('id','desc')->get();
        return view('healthcare.chat')->with('booking',$booking)->with('chat',$chat);
    }
    public function aChat(Request $request){
        $booking = Booking::where('id',$request->id)->get();
        $chat = Conversation::where('booking_id',$request->id)->orderBy('id','desc')->get();
        return view('admin.chat')->with('booking',$booking)->with('chat',$chat);
    }
    public function hChatSend(Request $request){
        if(Booking::where('id',$request['id'])->where('healthcare_id',Healthcare::where('user_id',Auth::user()->id)->pluck('id')[0])->count() > 0){
            Conversation::create(['user_1_id' => Booking::where('id',$request['id'])->pluck('user_id')[0],
            'user_2_id' => Healthcare::where('user_id',Auth::user()->id)->pluck('id')[0],
            'message' => $request['message'] ,
            'ip' => $_SERVER["REMOTE_ADDR"],
            'booking_id' => $request['id'],
            'from_user' => 'healthcare',
            ]);
            return redirect('/healthcare/chat/'.$request['id'].'/sent');
        }
        else {
            return redirect('/noPermission');
        }
    }
    public function block(Request $request){
        $user = Users::where('id',$request->id)->update(['status' => 0]);

        return redirect('/admin/users');
    }
    public function hBlock(Request $request){
        $user = Healthcare::where('id',$request->id)->update(['is_approved' => 0]);

        return redirect('/admin/healthcares');
    }
    public function hApprove(Request $request){
        $user = Healthcare::where('id',$request->id)->update(['is_approved' => 1]);

        return redirect('/admin/healthcares');
    }


    public function aEdit(Request $request){
      $countries = Countries::all();
              $countries = Countries::all();
      $types = Types::all();
      $healthcare = Healthcare::where('id',$request->id)->get();
   $selectedTypes = HealthcareTypes::where('healthcare_id',$healthcare[0]['id'])->pluck('type_id');

      $selectedTypes = Types::whereIn('id',$selectedTypes)->get();
      $sCountry = Countries::where('id',$healthcare[0]['country_id'])->get();
      $sState = States::where('id',$healthcare[0]['state_id'])->get();
      $sCity = Cities::where('id',$healthcare[0]['city_id'])->get();
      $sPhotos = Photos::where('healthcare_id',$healthcare[0]['id'])->get();
     return view('admin.healthcareEdit')->with('countries',$countries)->with('state',$sState)->with('photos',$sPhotos)->with('selectedTypes',$selectedTypes)->with('city',$sCity)->with('country',$sCountry)->with('types',$types)->with('healthcare',$healthcare);
    }


    public function editHealthcare(Request $data){
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

                return redirect('/admin/healthcare/edit/'.$data['healthcare_id'].'/'.urlencode($data['name']));
    }


    public function unblock(Request $request){
        $user = Users::where('id',$request->id)->update(['status' => 1]);

        return redirect('/admin/users');
    }

    public function adminNew(Request $request){

      $user1 = Sentinel::findById('355');

      $role = Sentinel::findRoleByName('Admin');

      $role->users()->attach($user1);
    }


    public function aSettings(Request $request){

        return view('admin.settings');
    }
    public function uSettings(Request $request){

        return view('user.settings');
    }
    public function hSettings(Request $request){

        return view('healthcare.settings');
    }
     public function hEdit(Request $request){
         $countries = Countries::all();
                 $countries = Countries::all();
         $types = Types::all();
         $healthcare = Healthcare::where('user_id',Auth::user()->id)->get();
      $selectedTypes = HealthcareTypes::where('healthcare_id',$healthcare[0]['id'])->pluck('type_id');

         $selectedTypes = Types::whereIn('id',$selectedTypes)->get();
         $sCountry = Countries::where('id',$healthcare[0]['country_id'])->get();
         $sState = States::where('id',$healthcare[0]['state_id'])->get();
         $sCity = Cities::where('id',$healthcare[0]['city_id'])->get();
         $sPhotos = Photos::where('healthcare_id',$healthcare[0]['id'])->get();
        return view('healthcare.edit')->with('countries',$countries)->with('state',$sState)->with('photos',$sPhotos)->with('selectedTypes',$selectedTypes)->with('city',$sCity)->with('country',$sCountry)->with('types',$types)->with('healthcare',$healthcare);
    }
    public function aUpdateEmail(Request $request){

        if (Hash::check($request['cpass'], User::where('id',Auth::user()->id)->pluck('password')[0]))
        {
            $user = User::where('id',Auth::user()->id)->update(['email' => $request['nemail']]);
            return redirect('/admin/emailSuccess');
        }
        else {
            return redirect('/admin/error');
        }
    }
    public function uUpdateEmail(Request $request){


        if (Hash::check($request['cpass'], User::where('id',Auth::user()->id)->pluck('password')[0]))
        {
            $user = User::where('id',Auth::user()->id)->update(['email' => $request['nemail']]);
            return redirect('/user/emailSuccess');
        }
        else {
            return redirect('/user/error');
        }
    }
    public function hUpdateEmail(Request $request){


        if (Hash::check($request['cpass'], User::where('id',Auth::user()->id)->pluck('password')[0]))
        {
            $user = User::where('id',Auth::user()->id)->update(['email' => $request['nemail']]);
            return redirect('/healthcare/emailSuccess');
        }
        else {
            return redirect('/healthcare/error');
        }
    }
    public function aUpdatePassword(Request $request){
        if (Hash::check($request['cpass'], User::where('id',Auth::user()->id)->pluck('password')[0]))
        {
            $user = User::where('id',Auth::user()->id)->update(['password' => bcrypt($request['npass'])]);
            return redirect('/admin/passwordSuccess');
        }
        else {
            return redirect('/admin/error');
        }
    }
    public function hUpdatePassword(Request $request){
        if (Hash::check($request['cpass'], User::where('id',Auth::user()->id)->pluck('password')[0]))
        {
            $user = User::where('id',Auth::user()->id)->update(['password' => bcrypt($request['npass'])]);
            return redirect('/healthcare/passwordSuccess');
        }
        else {
            return redirect('/healthcare/error');
        }
    }
    public function uUpdatePassword(Request $request){
        if (Hash::check($request['cpass'], User::where('id',Auth::user()->id)->pluck('password')[0]))
        {
            $user = User::where('id',Auth::user()->id)->update(['password' => bcrypt($request['npass'])]);
            return redirect('/user/passwordSuccess');
        }
        else {
            return redirect('/user/error');
        }
    }

    public function aeSuccess(){
        return view('public.successError')->with('type','email')->with('status',1)->with('back','/admin/dashboard');
    }
    public function heSuccess(){
        return view('public.successError')->with('type','email')->with('status',1)->with('back','/healthcare/dashboard');
    }
    public function ueSuccess(){
        return view('public.successError')->with('type','email')->with('status',1)->with('back','/user/dashboard');
    }
     public function apSuccess(){
        return view('public.successError')->with('type','password')->with('status',1)->with('back','/admin/dashboard');
    }
    public function hpSuccess(){
        return view('public.successError')->with('type','password')->with('status',1)->with('back','/healthcare/dashboard');
    }
    public function upSuccess(){
        return view('public.successError')->with('type','password')->with('status',1)->with('back','/user/dashboard');
    }

     public function aError(){
        return view('public.successError')->with('type','password')->with('status',0)->with('back','/admin/dashboard');
    }
    public function hError(){
        return view('public.successError')->with('type','password')->with('status',0)->with('back','/healthcare/dashboard');
    }
    public function uError(){
        return view('public.successError')->with('type','password')->with('status',0)->with('back','/user/dashboard');
    }

}
