<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ITEM;

class ItemController extends Controller
{
    public function store(Request $request){
        // validate the inputs
        $this->validate($request,[
            'item'=>'required|max:200|min:5',
            'catagory'=>'required',
            'quality'=>'required|numeric|min:0',
            'description'=>'required|max:1000|min:10',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image')){
            //Get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //added created time to handle duplicates

            //upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        $varitem = $request->input('item');
        $varcatagory = $request->input('catagory');
        $varquality = $request->input('quality');
        $vardescription = $request->input('description');
    
         $createTime = new \DateTime();
         $data = array('item'=>$varitem,'catagory'=>$varcatagory,'quality'=>$varquality,'description'=>$vardescription,'created_at'=>$createTime,'cover_image'=>$fileNameToStore);
        
        \DB::table('items')->insert($data);
        $data = ITEM::orderby('created_at','desc')->get()->paginate(6);
        $topic = 'Item List';
        return view('showtable')->with('tableData',$data)->with('topic',$topic);
        
    }

    public function RandomPage($id){
        $requiredRow = ITEM::find($id);
        return view('RandomItem')->with('randomData',$requiredRow);
    }
}
