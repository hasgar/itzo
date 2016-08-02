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
    protected function create(array $data)
    {
       
        $user = User::create([
            'name' => $data['email'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        if($data['type'] == 1){
            Users::create([
            'name' => $data['email'],
            'user_id' => $user['id'],
            'country_id' => $data['country'],
            'state_id' => $data['state'],
            'city_id' => $data['city'],
        ]);
            $user1 = Sentinel::findById($user['id']);

            $role = Sentinel::findRoleByName('User');

            $role->users()->attach($user1);
        }
        else if($data['type'] == 2){
            Healthcare::create([
            'name' => $data['name'],
            'user_id' => $user['id'],
            'email' =>  $data['email'],
            'country_id' => $data['country'],
            'state_id' => $data['state'],
            'city_id' => $data['city'],
            'address' => $data['address'],
            'pin' => $data['pin'],
            'mobile' => $data['mobile'],
            'phone' => $data['phone'],
            'description' => $data['description'],
            'payment_till' => '2016-12-31',
        ]);
            $user1 = Sentinel::findById($user['id']);

            $role = Sentinel::findRoleByName('Healthcare');

            $role->users()->attach($user1);
        }
        return $user;
    }
}
