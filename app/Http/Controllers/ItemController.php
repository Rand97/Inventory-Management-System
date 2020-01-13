<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\ITEM;
use Session;
use App\User;

class ItemController extends Controller
{
    public function store(Request $request){
        //check for correct user
        $userId = Session::get('id');
        $requiredUserRow = User::find($userId);
        $role = $requiredUserRow->role;
        if($role != 'admin'){
            abort(404,'page not found');
        }
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
        return view('pages.home')->withMessage("New Item added Successfully !!!");
        
    }

    public function RandomPage($id){
        $requiredRow = ITEM::find($id);
        return view('RandomItem')->with('randomData',$requiredRow);
    }

    public function deteteItem($id){
        //check for correct user
        $userId = Session::get('id');
        $requiredUserRow = User::find($userId);
        $role = $requiredUserRow->role;
        if($role != 'admin'){
            abort(404,'page not found');
        }
        $requiredRow = ITEM::find($id);
        
        if($requiredRow->cover_image != 'noimage.jpg'){
            //delete cover_image from storage
            Storage::delete('public/cover_images/'.$requiredRow->cover_image);
        }
        $requiredRow->delete();
        return view('pages.home')->withMessage('Deleted Successfully'); 
    }

    public function updateItem($id){
        //check for correct user
        $userId = Session::get('id');
        $requiredUserRow = User::find($userId);
        $role = $requiredUserRow->role;
        if($role != 'admin'){
            abort(404,'page not found');
        }
        $requiredRow = ITEM::find($id);
        return view('updatePage')->with('itemdata',$requiredRow);
    }

    public function update(Request $request){
        //check for correct user
        $userId = Session::get('id');
        $requiredUserRow = User::find($userId);
        $role = $requiredUserRow->role;
        if($role != 'admin'){
            abort(404,'page not found');
        }
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
        
    
        $updateTime = new \DateTime();

        $id = $request->input('hidden_id');
        $requiredRow = ITEM::find($id);
        $requiredRow->item = $request->input('item');
        $requiredRow->catagory = $request->input('catagory');
        $requiredRow->quality = $request->input('quality');
        $requiredRow->description = $request->input('description');
        $requiredRow->updated_at = $request->input('created_at');
        if($request->hasFile('cover_image')){
            $requiredRow->cover_image = $fileNameToStore;
        }
        $requiredRow->save();
        
        return view('pages.home')->withMessage('Updated Successfully');
        
    }
}
