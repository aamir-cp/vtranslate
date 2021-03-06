<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Models\Country;

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
   // protected $redirectTo = RouteServiceProvider::HOME;

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
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'country' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
     try {
            if(isset($data['job_notification']))
            {
                $job_notification_status=1;
            }
            else
            {
                $job_notification_status=0;
            }
            return User::create([
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'country_id' => $data['country'],
                'zipcode' => $data['zipcode'],
                'email' => $data['email'],
                'username' => $data['username'],
                'job_notification'=>$job_notification_status,
                'password' => Hash::make($data['password']),
            ]);
        }
        catch (\Exception $exception){
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }

    //override this function 
    public function showRegistrationForm()
    {
        $countries=Country::all();
        return view('auth.register',compact('countries'));
    }

    //redirect to
    protected function redirectTo()
    {
        $message = "You have successfully signed up. Please proceed to your mailbox to activate your account.";
        toastr()->success($message);
        return route('login.success');
    }

    //check if email not verified
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
//        $this->guard()->login($user);
        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        return $request->wantsJson()
            ? new Response('', 201)
            : redirect($this->redirectPath());
    }
}
