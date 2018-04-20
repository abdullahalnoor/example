<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Session;
use Mail;
use App\LucumProfile;


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
    protected $redirectTo = '/home';

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
        return Validator::make($data, [
            // 'email' => 'required|string|email|max:255|unique:users',
            // 'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'gmc_Number' => 'required',
            'address_one' => 'required',
            'address_two' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'phone_number' => 'required',
            'reference_phone_number' => 'required',
         

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
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'password' => bcrypt($data['password']),
            'gmc_Number' => $data['gmc_Number'],
            'address_one' => $data['address_one'],
            'address_two' => $data['address_two'],
            'city' => $data['city'],
            'postcode' => $data['postcode'],
            'phone_number' => $data['phone_number'],
            'reference_phone_number' => $data['reference_phone_number'],
        ]);
    }
    public function register(Request $request)
    {
        // dd(Session::get('email'));
        
        $this->validator($request->all())->validate();
         $user = User::create([
            'email' => Session::get('email'),
            'first_name' => Session::get('first_name'),
            'last_name' => Session::get('last_name'),
            'password' => bcrypt($request['password']),
            'gmc_Number' => $request['gmc_Number'],
            'address_one' => $request['address_one'],
            'address_two' => $request['address_two'],
            'city' => $request['city'],
            'postcode' => $request['postcode'],
            'phone_number' => $request['phone_number'],
            'reference_phone_number' => $request['reference_phone_number'],
        ]);
         
          $lucumProfile = new LucumProfile();  
            $lucumProfile->lucum_id =  $user->id;
            $lucumProfile->save();  


        //event(new Registered($user = $this->create($request->all())));
         $data = $user->toArray();
        Mail::send('mail.form',$data,function($message) use($data){
            $message->from($data['email']);
            $message->to('elpic-20413d@inbox.mailtrap.io');
            $message->subject('Congratulation Mail');
        });

        //$this->guard()->login($user);
        return redirect()->to('/login');
        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
    }

}
 