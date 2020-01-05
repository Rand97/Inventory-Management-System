<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ITEM;

class ItemController extends Controller
{
    function store(Request $request){
        $this->validate($request,[
            'item'=>'required|max:100|min:2',
            'catagory'=>'required',
            'quality'=>'required',
            'description'=>'required|max:250|min:2',
        ]);

        $varitem = $request->input('item');
        $varcatagory = $request->input('catagory');
        $varquality = $request->input('quality');
        $vardescription = $request->input('description');
    
         $createTime = new \DateTime();
         $data = array('item'=>$varitem,'catagory'=>$varcatagory,'quality'=>$varquality,'description'=>$vardescription,'created_at'=>$createTime);
        
        \DB::table('items')->insert($data);
        $data = ITEM::orderby('item','asc')->get()->paginate(4);
        $topic = 'Item List';
        return view('showtable')->with('tableData',$data)->with('topic',$topic);
        // $var1 = $data->count();
        // for ($i = 0;$i < $var1 ;$i++) {
        //     echo ($data[$i]);
        //     echo "<br>";
        // }
        // echo ($data[0]->item);
        
    }

    function show() {
        
    }
}
