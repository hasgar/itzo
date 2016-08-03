<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Sentinel;
use App\Countries;
use App\Booking;
use App\Users;
use App\Healthcare;
use App\Conversation;
class UserController extends Controller
{

    public function showSignIn(){
      
        if (Auth::check()) {
            $user = Sentinel::findById(Auth::user()->id);
            if ($user->inRole('admin')){
               return redirect('/admin/dashbaord');
            }
            if ($user->inRole('user')){
               return redirect('/user/dashbaord');
            }
            if ($user->inRole('healthcare')){
               return redirect('/healthcare/dashbaord');
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
               return redirect('/admin/dashbaord');
            }
            if ($user->inRole('user')){
               return redirect('/user/dashbaord');
            }
            if ($user->inRole('healthcare')){
               return redirect('/healthcare/dashbaord');
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
    public function hDashboard(){
        
        $booking = Booking::where('healthcare_id',Healthcare::where('user_id',Auth::user()->id)->pluck('id')[0])->with(['healthcare','user'])->orderBy('id','desc')->get();

                return view('healthcare.dashboard')->with('booking',$booking);
    }
     public function hChat(Request $request){
        $booking = Booking::where('id',$request->id)->get();
        $chat = Conversation::where('user_2_id',Healthcare::where('user_id',Auth::user()->id)->pluck('id')[0])->where('booking_id',$request->id)->orderBy('id','desc')->get();
                return view('healthcare.chat')->with('booking',$booking)->with('chat',$chat);
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
}
