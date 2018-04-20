<?php

namespace App\Http\Controllers\Auth;

use App\PracticeForm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Session;
use App\PracticeCCG;
use App\PracticeItSystemm;
use App\PracticeItSystemItem;
use Mail;


class PracticeRegisterController extends Controller
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
    protected $redirectTo = '/practice/login/form';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:practice');
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {   
        $practiceCcgs = PracticeCCG::get();
        $practiceItSystemms = PracticeItSystemm::get();
        return view('front.form.practice-form',[
            'practiceCcgs'=>$practiceCcgs,
            'practiceItSystemms'=>$practiceItSystemms,
        ]);
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
           
            'practice_name' => 'required',
            'practice_code' => 'required',
            'practice_postcode' => 'required',
            'phone_number' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'reference_phone_number' => 'required',
            'payment_type' => 'required',
            

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
        return PracticeForm::create([
            'practice_name' => $data['practice_name'],
            'practice_code' => $data['practice_code'],
            'practice_postcode' => $data['practice_postcode'],
            'phone_number' =>$data['phone_number'],
            'ccg_id' => $data['ccg_id'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' =>  bcrypt($data['password']),
            'payment_type' => $data['payment_type'],
        ]);
    }
    public function register(Request $request)
    {
        // dd(Session::get('email'));
        //return $request->all();
       // $this->validator($request->all())->validate();
       $PracticeForm =  PracticeForm::create([
            'practice_name' => $request['practice_name'],
            'practice_code' => $request['practice_code'],
            'practice_postcode' => $request['practice_postcode'],
            'phone_number' => $request['phone_number'],
            'ccg_id' => $request['ccg_id'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'payment_type' => $request['payment_type'],
            
        ]);
      $practiceFormId = $PracticeForm->id;

        $systemAllId = $request->it_system_id;

        foreach ($systemAllId as  $systemId) {
            //dd($systemId);
            $PracticeItSystemItem = new PracticeItSystemItem();

            $PracticeItSystemItem->practice_form_id = $practiceFormId;
            $PracticeItSystemItem->it_system_id = $systemId;
            $PracticeItSystemItem->save();

        }
        $data = $PracticeForm->toArray();
        Mail::send('mail.form',$data,function($message)  use($data){
            $message->to('elpic-20413d@inbox.mailtrap.io');
            $message->from($data['email']);
            $message->subject('Congratulation Mail');
        });
        //event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);
        return redirect('practice/login/form')->with('success','You Have Registered Successfully ');
        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
    }

}
 //            Session::put('first_name',$request->first_name);
 //            Session::put('last_name',$request->last_name);