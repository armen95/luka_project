<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


use App\User;


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
    protected $redirectTo = '/signup';

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
    
    public function index() {
        return view('guest/signup');
    }

    public function signup( Request $r ) {
        
        $default_role = 'user';

        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'phonenumber' =>"required|min:3|max:191",
            'age'=> "required|numeric",
            'address' =>'required|min:6|max:191',
            'email' => "required|email|unique:users,email",
            'password'=>'required|min:6|max:20',

        ];

        $validator = Validator::make($r->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors())->withInput();
        }
        else{
            User::create([
                'firstname' => $r->firstname,
                'lastname' => $r->lastname,
                'phonenumber' =>$r->phonenumber,
                'age'=> $r->age,
                'address' =>$r->address,
                'email' => $r->email,
                'type' => $default_role,
                'password'=>Hash::make($r->password),
            ]);

            return redirect()->back();
        }       
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
