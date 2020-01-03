<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    function store(Request $request){
        $this->validate($request,[
            'item'=>'required|max:30|min:2',
            'name'=>'required|max:30|min:2',
            'quality'=>'required',
        ]);

        $varitem = $request->input('item');
        $varname = $request->input('name');
        $varquality = $request->input('quality');
        $varavailability = $request->input('availability');
        $vardescription = $request->input('description');

        $createTime = new \DateTime();
        $data = array('item'=>$varitem,'name'=>$varname,'quality'=>$varquality,'availability'=>$varavailability,'description'=>$vardescription,'created_at'=>$createTime);

        \DB::table('items')->insert($data);

        echo ("success");
    }
}
