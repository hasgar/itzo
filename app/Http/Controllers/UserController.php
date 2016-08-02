<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Sentinel;
use App\Countries;
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
                return view('public.userDashboard');
    }
}
