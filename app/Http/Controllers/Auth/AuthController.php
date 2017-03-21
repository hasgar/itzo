<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Sentinel;
use App\Users;
use App\Healthcare;
use App\Photos;
use Illuminate\Support\Facades\Input;
use App\Types;
use App\HealthcareTypes;
use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
    public function redirectPath()
    {
      if (Auth::check()) {
        $user = Sentinel::findById(Auth::user()->id);
        if ($user->inRole('admin')){
            return '/admin/dashboard';
        }
        if ($user->inRole('healthcare')){
            return '/healthcare/dashboard';
        }
        if ($user->inRole('user')){
          if (Users::where('user_id',Auth::user()->id)->first()["is_verified"] == 0) {
            return '/userOtp';
          }
            return '/user/dashboard';
        }

            return '/';
      }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function authenticate()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password],true)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data, $request)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $otp = rand(1000,9999);
        if (!isset($data['city'])) {
          $data['city'] = "0";
        }
        if($data['type'] == 1){
            Users::create([
            'name' => $data['name'],
            'user_id' => $user['id'],
            'email' => $user['email'],
            'country_id' => $data['country'],
            'mobile' => $data['country_code'].$data['mobile'],
            'country_code' => $data['country_code'],
            'state_id' => $data['state'],
            'OTP' => $otp,
            'is_verified' => 0,
            'city_id' => $data['city'],
        ]);
        if ($data['country_code'] == "91") {
  $username = "chikitzosearch@gmail.com";
	$hash = "35cb84c9d6a28ee5a7e67369f3db75b399c0f485";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = $data['country_code'].$data['mobile']; // A single number or a comma-seperated list of numbers
	$message = "Thank you for registering with us. your OTP is: ".$otp;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
} else {
  $subject = 'Thanks for registering with Chikitzo';
  $message = 'Hello '.$data['name'].' Team,

  Thanks for registering with us.

  Your OTP is: '.$otp.'

  Regards,
  Chikitzo Team';
  $from = 'info@chikitzo.com';

  mail($to, $subject, $message);
}
            $user1 = Sentinel::findById($user['id']);

            $role = Sentinel::findRoleByName('User');

            $role->users()->attach($user1);

        }
        else if($data['type'] == 2){
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

            $otp = rand(1000,9999);
           $healthcare = Healthcare::create([
            'name' => $data['name'],
            'user_id' => $user['id'],
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
            'mobile' => $data['country_code_mobile'].$data['mobile'],
            'phone' =>$data['country_code_phone'].$data['mobile'],
            'fax' => $data['country_code_fax'].$data['mobile'],
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
            'payment_mode' => $data['payment_mode'],
            'payment_done' => 1,
            'payment_till' => '2017-12-31',
            'is_approved' => 1,
            'OTP' => $otp,
            'is_verified' => 1
        ]);


        $pro_pic = '';
        $i = 0;
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
            'healthcare_id' => $healthcare['id'],
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
            Healthcare::where('id',$healthcare['id'])->update(['pro_pic' => $pro_pic]);
        $types_count = Types::all()->count();
        for($i = 1;$i <= $types_count ; $i++) {
        if($data["treatment_type_$i"] != "")
        {
            HealthcareTypes::create([
            'type_id' => $data["treatment_type_$i"],
            'healthcare_id' => $healthcare['id']
        ]);
        }
        }

            $user1 = Sentinel::findById($user['id']);

            $role = Sentinel::findRoleByName('Healthcare');

            $role->users()->attach($user1);
            $to = $data['email'];
    $subject = 'Thanks for registering with Chikitzo';
    $message = 'Hello '.$data['name'].' Team,

    Thanks for registering with us.

    Your OTP is: '.$otp.'

    Regards,
    Chikitzo Team';
    $from = 'info@chikitzo.com';

    //mail($to, $subject, $message);



        }
        return $user;
    }
}
