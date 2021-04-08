<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function incrementSlug($slug) {

        $original = $slug;
    
        $count = 2;
    
        while (Profile::where('profile_link', '=', $slug)->exists()) {
    
            $slug = "{$original}-" . $count++;
        }
    
        return $slug;
    
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id'=>3,
        ]);
        $profile_slug=Str::slug($user->name,'-');
        if (Profile::where('profile_link', '=', $profile_slug)->exists()) {
            $profile_slug=$this->incrementSlug($profile_slug);
        }
        $user->profile()->save(new Profile([
            'profile_link' => $profile_slug,
        ]));
        return $user;
    }
    public function register(Request $request)  {   
        $validation = $this->validator($request->all());
        if ($validation->fails())  {  
            return response()->json($validation->errors()->toArray());
        }
        else{
            $user = $this->create($request->all());
            Auth::login($user);
            if (Auth::user()){
                return response()->json(['response' => '']);
            }
        }
    }

}
