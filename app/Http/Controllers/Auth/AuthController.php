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
use App\Types;
use App\HealthcareTypes;
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
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
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
        if($data['type'] == 1){
            Users::create([
            'name' => $data['name'],
            'user_id' => $user['id'],
            'email' => $user['email'],
            'country_id' => $data['country'],
            'mobile' => $data['mobile'],
            'state_id' => $data['state'],
            'city_id' => $data['city'],
        ]);
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
            $healthcare = Healthcare::create([
            'name' => $data['name'],
            'user_id' => $user['id'],
            'email' =>  $data['email'],
            'certificate' =>  $data['certificate'],
            'country_id' => $data['country'],
            'state_id' => $data['state'],
            'city_id' => $data['city'],
            'address' => $data['address'],
            'pin' => $data['pin'],
            'mobile' => $data['mobile'],
            'phone' => $data['phone'],
            'fax' => $data['fax'],
            'price' => $data['price'],
            'description' => $data['description'],
            'veg' => $data['food_veg'],
            'non_veg' => $data['food_non_veg'],
            'organic' => $data['food_organic'],
            'personalised_diet' => $data['food_personalised'],
            'food' => $data['food'],
            'general_ward' => $data['accommodation_general'],
            'shared' => $data['accommodation_shared'],
            'single_non_ac' => $data['accommodation_single_non_ac'],
            'single_ac' => $data['accommodation_single_ac'],
            'mon_from' => $data['working_hours_mon_from'],
            'mon_to' => $data['working_hours_mon_to'],
            'sun_from' => $data['working_hours_sun_from'],
            'sun_to' => $data['working_hours_sun_to'],
            'contact_email' => $data['contact_email'],
            'contact_name' => $data['contact_name'],
            'website' => $data['website'],
            'lab' => $data['fec-lab'],
            'parking' => $data['fec-parking'],
            'pharmacy' => $data['fec-pharmacy'],
            'wheelchair' => $data['fec-wheelchair'],
            'ambulance' => $data['fec-ambulance'],
            'inpatient' => $data['fec-inpatient'],
            'bloodbank' => $data['fec-bloodbank'],
            'fitness' => $data['fec-fitnesscentre'],
            'yoga' => $data['fec-yoga'],
            'massage' => $data['fec-massage'],
            'sports' => $data['fec-sports'],
            'tours' => $data['fec-tours'],
            'insurance' => $data['fec-insurance'],
            'cash' => $data['pay-cash'],
            'debit_card' => $data['pay-debitcard'],
            'debit_card' => $data['pay-creditcard'],
            'cheque' => $data['pay-cheque'],
            'longtitude' => $data['loc-lon'],
            'latitude' => $data['loc-lat'],
            'payment_till' => '2016-12-31',
            'is_approved' => 0
        ]);
        $pro_pic = '';
            for($i=1;$i<4;$i++){
                if($request->hasFile('photo_'.$i)){
               
            $extension = $request->file('photo_'.$i)->getClientOriginalExtension();
            $destinationPath = 'images/healthcare/';
            $fileName = str_replace(" ","",uniqid('img_'.$healthcare['id'].'_', true).microtime().'.'.$extension);
            if($i == 1)
$pro_pic = $fileName;
            if($request->file('photo_'.$i)->move($destinationPath, $fileName))
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
        }
        return $user;
    }
}
