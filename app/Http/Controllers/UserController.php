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
        $user = User::where('id',$booking[0]['user_id'])->first();

                return view('healthcare.dashboard')->with('booking',$booking)->with('user',$user);
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
    public function unblock(Request $request){
        $user = Users::where('id',$request->id)->update(['status' => 1]);

        return redirect('/admin/users');
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
