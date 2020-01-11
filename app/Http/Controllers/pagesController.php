<?php

namespace App\Http\Controllers;
use Session;
use App\User;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        return view ('pages.index');
    }

    public function home($id){
        $user=User::where('id' ,$id)->first();
        if(!(Session::get('id'))){
            return view('pages.login')->with('msg','please login');
        }
        return view('pages.home')->with('user' ,$user);
    }
}


