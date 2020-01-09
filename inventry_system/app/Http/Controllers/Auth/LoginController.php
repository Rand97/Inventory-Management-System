<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Google_Client;
use Laravel\Socialite\Facades\Socialite;
use App\UserDetail;
require_once 'C:\xampp\htdocs\inventry_system\vendor\autoload.php';



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

    public function redirectToProvider()
    {
       // return Socialite::driver('google')->redirect();
        

       $client=new Google_Client();
       $client->setClientID("1042287853967-l8jjmdj61t6jomsi2do4e5vaj0pml4a9.apps.googleusercontent.com");
       $client->setClientSecret("q2QRJERkYkSYdgUwboidjD0w");
       $client->setRedirectUri("http://localhost/inventry_system/public/afterlogin");
       $client->addScope('email');
       $client->addScope('profile');
       $lu=$client->createAuthUrl();
       return view('index')->with('lu', $lu);

       /*if(isset($_GET['code'])){
            $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            $google_oauth= new Google_Service_Oauth2($client);
            $google_account_info=$google_oauth->userinfo->get();

           

            return view('afterlogin')->with('user',$google_account_info);


       }*/
       


    }
    

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        if(explode("@", $user->email)[1] !== 'eng.pdn.ac.lk'){
            return redirect()->to('/');
        }

        $new_user= new UserDetail;
        $new_user->email=$user->getEmail();
        $new_user->name=$user->getName();
        $new_user->p_p=$user->getAvatar();
        $new_user->token=$user->getId();

        $new_user->save();

        
        return redirect()->to('afterlog/'.$new_user->id);
        
    }

    public function logout($id){

        $nu =UserDetail::find($id);
        $nu->status='Logged out';
        $nu->save();

        $client=new Google_Client();
        $client->setClientID("1042287853967-l8jjmdj61t6jomsi2do4e5vaj0pml4a9.apps.googleusercontent.com");
        $client->setClientSecret("q2QRJERkYkSYdgUwboidjD0w");
        $client->setRedirectUri("http://localhost/inventry_system/public/afterlogin");
        $client->addScope('email');
        $client->addScope('profile');
        $lu=$client->createAuthUrl();
        return view('index')->with('lu', $lu);

    }

    public function afterlog($id){

        
        $nu =UserDetail::find($id);
        if($nu->token != null && ($nu->created_at == $nu->updated_at)){

        return view('afterlogin')->with('user',$nu);
        }
        else{

        return redirect()->to('/');

        }
    }

}