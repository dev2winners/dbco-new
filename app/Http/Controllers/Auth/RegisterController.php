<?php

namespace App\Http\Controllers\Auth;

use App\Ticket;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
	
	protected $redirectTo = '/lk/customer';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $val= Validator::make($data, [
            //'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

/*        Ticket::create_notification( 0, 501,''); */
        return $val;
    }
    public function messages()
    {
        return [
            'email.unique' => 'E-mail не уникален',
            'password.confirmed'  => 'Пароли не совпадают',
        ];
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $verify_code=rand(1111,9999);
        $user= User::create([
            //'name' => $data['name'],
			'name' => (empty($data['name'])) ? 'not defined' : $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verify_code' => $verify_code,
        ]);

        Ticket::create_notification($user->id,500,$verify_code);
        return $user;
    }
}
