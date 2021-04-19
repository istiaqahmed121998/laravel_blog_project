<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function redirectToDiscord(){
        return Socialite::driver('discord')->redirect();
    }

    public function handleDiscordCallback()
    {
        $user = Socialite::driver('discord')->stateless()->user();
        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('author.dashboard');
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('author.dashboard');
    }
    public function incrementSlug($slug) {

        $original = $slug;

        $count = 2;

        while (Profile::where('profile_link', '=', $slug)->exists()) {

            $slug = "{$original}-" . $count++;
        }

        return $slug;

    }

    protected function _registerOrLoginUser($data)
    {
        if(!Auth::check()){
            $user = User::where('email', '=', $data->email)->first();
            if (!$user) {
                $user= new User();
                $user->name = $data->name;
                $user->email = $data->email;
                $user->provider_id = $data->id;
                $user->role_id = 2;
                $user->save();
                $profile_slug=Str::slug($user->name,'-');
                if (Profile::where('profile_link', '=', $profile_slug)->exists()) {
                    $profile_slug=$this->incrementSlug($profile_slug);
                }
                $profile=new Profile();
                $profile->profile_link=$profile_slug;
                $profile->avatar=$data->avatar;
                $user->profile()->save($profile);
            }
            if($user){
                $user->provider_id = $data->id;
                $user->save();
                $profile=Profile::where('user_id', '=', $user->id)->first();
                if($profile){
                    $profile->avatar=$data->avatar;
                    $user->profile()->save($profile);
                }
            }
    
            Auth::login($user);
        }
        else{
            return dd($data);
        }
        
        
        
    }
}
