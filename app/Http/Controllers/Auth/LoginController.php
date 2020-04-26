<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
Use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;
use App\User;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    

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
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $checkuser= $this->createUser($user, 'google');
        Auth::login($checkuser,true);
        return redirect($this->redirectTo);
    
        
    }

   public function createUser($user,$provider){
        $checkuser = User::where('provider_id',$user->id)->first();
        if($checkuser)
         return $checkuser;
        
        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at'=> Carbon::now(),
            'password'=> Hash::make(bin2hex(openssl_random_pseudo_bytes(4))),
            'provider' => $provider,            
            'provider_id'=> $user->id
        ])->assignRole('readers');
    }
}
