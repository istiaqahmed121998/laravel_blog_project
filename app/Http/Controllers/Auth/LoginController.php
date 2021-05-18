<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mail\passwordSent;
use App\Models\User;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToDiscord()
    {
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
    public function incrementSlug($slug)
    {

        $original = $slug;

        $count = 2;

        while (Profile::where('profile_link', '=', $slug)->exists()) {

            $slug = "{$original}-" . $count++;
        }

        return $slug;
    }

    public function ajaxlogin(Request $request)
    {
        if (!Auth::check()) {
            $credentials = $request->only($this->username(), 'password');
            $authSuccess = Auth::attempt($credentials, $request->has('remember'));

            if ($authSuccess) {
                $request->session()->regenerate();
                return response()->json(['redirect' => true, 'success' => true], 200);
            }
            return response()->json(['success' => false], 422);
        }
    }
    public function ajaxregister(Request $request)
    {
        if (!Auth::check()) {
            $user = User::where('email', '=', $request->input('email'))->first();
            if (!$user) {

                $user = new User();
                $user->name = preg_replace('/@.*?$/', '', $request->input('email'));
                $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
                $password = substr($random, 0, 10);
                $user->email = $request->input('email');
                $user->password = Hash::make($password);
                $user->role_id = 3;
                $user->save();
                Mail::to($request->input('email'))->send(new passwordSent($password));
                Auth::login($user);
                return response()->json(['redirect' => true, 'success' => true], 200);
            }
            elseif($user){
                return response()->json(['success' => false,'message'=>'Already existed'], 422);
            }
        }
    }

    protected function _registerOrLoginUser($data)
    {
        if (!Auth::check()) {
            $user = User::where('email', '=', $data->email)->first();
            if (!$user) {
                $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
                $password = substr($random, 0, 10);
                $user = new User();
                $user->name = $data->name;
                $user->email = $data->email;
                $user->provider_id = $data->id;
                $user->password = Hash::make($password);
                $user->role_id = 3;
                $user->save();
                Mail::to($data->email)->send(new passwordSent($password));
            }
            Auth::login($user);
        } else {
            return dd($data);
        }
    }
}
