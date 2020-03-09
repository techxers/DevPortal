<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Organisation;
use App\Providers\RouteServiceProvider;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],


            'title' => ['required', 'string', 'max:255'],
            'company_email' => ['required', 'string', 'email', 'max:255'],
            'postcode' => [],
            'tel' => ['required', 'numeric'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'website' => [''],
            'industry' => [],
            'type' => [],

            'regProducts' => [],
            'regPlans' => [],
            'regTotalPayee' => []
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {

        $organisation = Organisation::create([
            'name' => $data['title'],
            'email' => $data['company_email'],
            'postcode' => $data['postcode'],
            'phone' => $data['tel'],
            'city' => $data['city'],
            'country' => $data['country'],
            'website' => $data['website'],
            'industry' => $data['industry'],
            'type' => $data['type']
        ]);
        $subscription = Subscription::create([
                "organisation_id" => $organisation->id,
                "products" => $data['regProducts'],
                "plans" => $data['regPlans'],
                "amount_paid" => $data['regTotalPayee'],
                "subscribed_on" => Carbon::now()
            ]
        );

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'organisation_id' => $organisation->id,
            'role_id' => 2
        ]);
    }

    /*
    ***Override****/
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);
        session()->flash('status', 'Please check your user email for the verification link');

        return redirect()->route('login');
        //return $this->registered($request, $user)
        //    ?: redirect($this->redirectPath());
    }

}
