<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Http\Controllers\pagesController;
use DB;
use Session;
use Auth;
use Socialite;
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
    

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->with(['access_type' => 'offline',
        'scopes'=>'email'])->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user=Socialite::driver('google')->stateless()->user();
        if( substr($user->email, -13) != 'eng.pdn.ac.lk' ){
            return view('pages.login')->with('msg','please login with valid');
        }

        $existUser = User::where('email',$user->email)->first();
        if(!$existUser){
            $User=new User([
                'google_id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'image_url' => $user->getAvatar(),
                'google_refresh_token' => $user->refreshToken,
                'last_login_at' => Carbon::now(),
                'last_login_ip' => '192.168.1.1',
            ]);
            $User->save();
        }

        $refresh_token=DB::table('users')->where('email',$user->getEmail())->value('google_refresh_token');          
        if($user->refreshToken){
            $refresh_token=$user->refreshToken;
        }
        if($existUser){
            $data=[
                'google_id' => $user->getId(),
                'name' => $user->getName(),
                'image_url' => $user->getAvatar(),
                'google_refresh_token' => $refresh_token,
                'last_login_at' => Carbon::now(),
                'last_login_ip' => '192.168.1.1',

            ];

            DB::table('users')->where('email',$user->getEmail())->update($data);
            
            

        }

        $id=User::where('email',$user->email)->value('id');

        Session::put('id', $id);

        return redirect()->route('home',$id);
    }

    public function logout(){
        Session::forget('id');
        return redirect()->route('index');
    }
}



