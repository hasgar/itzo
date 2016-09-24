<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Sentinel;
use App\Countries;
use App\Booking;
use App\Users;
use App\User;
use App\Types;
use App\Healthcare;
use App\Conversation;
use Illuminate\Support\Facades\Hash;
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
        $booking = Booking::where('user_id',Users::where('user_id',Auth::user()->id)->pluck('id')[0])->with(['healthcare'])->orderBy('id','desc')->get();
                return view('user.dashboard')->with('booking',$booking);
    }
     public function chat(Request $request){
        $booking = Booking::where('id',$request->id)->get();
        $chat = Conversation::where('user_1_id',Users::where('user_id',Auth::user()->id)->pluck('id')[0])->where('booking_id',$request->id)->orderBy('id','desc')->get();
                return view('user.chat')->with('booking',$booking)->with('chat',$chat);
    }
    public function chatSend(Request $request){
        if(Booking::where('id',$request['id'])->where('user_id',Auth::user()->id)->count() > 0){
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


public function noPermission(){
          return view('public.noPermission');
    }
    public function hDashboard() {
        
        $booking = Booking::where('healthcare_id',Healthcare::where('user_id',Auth::user()->id)->pluck('id')[0])->with(['healthcare','user'])->orderBy('id','desc')->get();

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
         $healthcare = Healthcare::where('user_id',Auth::user()->id);
        
        return view('healthcare.edit')->with('countries',$countries)->with('types',$types)->with('healthcare',$healthcare);
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
