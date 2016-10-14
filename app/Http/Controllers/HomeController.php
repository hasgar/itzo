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
    public function notFound()
    {
        return view('public.notFound');
   
    }
    public function contact()
    {
        return view('public.contact');
   
    }

    public function contactSend(Request $request) {
        if(isset($request['subject']) && isset($request['name']) && isset($request['email']) && isset($request['message'])) {
         $emails = "info@chiktizo.com";
          $email = htmlspecialchars($request['email']) ;
        $name = htmlspecialchars($request['name']);
$sub = htmlspecialchars($request['subject']);
$subject = "Contact Form Message from $name";
$msg = htmlspecialchars($request['message']);
$message = "Name: <b>$name</b><br>Email: <b>$email</b><br>Mobile: <b>$sub</b><br>Message: <b>$msg</b>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: ". $emails . "\r\n" .
"Reply-To: " . $email . "\r\n" .
"X-Mailer: PHP/" . phpversion();
if(mail("md.jasil@gmail.com",$subject,$message,$headers)){
   return view('public.contactSuccess');
}
else {
   return view('public.contactError');
}
        }
    }
    
}
