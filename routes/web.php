<?php
use Illuminate\Support\Facades\Request;
use App\ITEM;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// add items route
Route::get('/add', function () {
    $userId = Session::get('id');
    $requiredUserRow = User::find($userId);
    $role = $requiredUserRow->role;
    if($role != 'admin'){
        abort(404,'page not found');
    }
    return view('addItems');
});

Route::get('/modules', function () {
    $data = ITEM::where('catagory','Modules & Sensors')->orderby('item','asc')->get()->paginate(7);
    $topic = 'Modules & Sensors';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/power', function () {
    $data = ITEM::where('catagory','Power Supplies')->orderby('item','asc')->get()->paginate(7);
    $topic = 'Power Supplies';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/accessories', function () {
    $data = ITEM::where('catagory','Accessories')->orderby('item','asc')->get()->paginate(7);
    $topic = 'Accessories';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/passive', function () {
    $data = ITEM::where('catagory','Passive Components')->orderby('item','asc')->get()->paginate(7);
    $topic = 'Passive Components';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/electro', function () {
    $data = ITEM::where('catagory','Electromechanical')->orderby('item','asc')->get()->paginate(7);
    $topic = 'Electromechanical';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/other', function () {
    $data = ITEM::where('catagory','Other')->orderby('item','asc')->get()->paginate(7);
    $topic = 'Other';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::post('addItems_store', [
    'uses' => 'ItemController@store'
  ]);

  Route::post('updatePage_updateItem', [
    'uses' => 'ItemController@updatePage'
  ]);

Route::post('updatePage_update', [
    'uses' => 'ItemController@update'
  ]);

//route for search option 
Route::post('/search',function(){
    $searchFor = Request::get('searchitem');
    $id = Session::get('id');
    $user = User::where('id' ,$id)->first();
    if(empty($searchFor)){
        return view('pages.home')->withMessage("Fill the search bar!!!")->with('user',$user);
    }
    $searchResult = ITEM::where('item', 'LIKE' , '%' . $searchFor . '%')->orderBy('item','asc')->get()->paginate(7);
    if(count($searchResult) > 0){
        return view('showtable')->with('tableData',$searchResult)->with('user',$user);
    }
    else{
        return view('pages.home')->withMessage("No items found !!!")->with('user',$user);
    }
    
});

Route::get('/random/{id}','ItemController@RandomPage');

Route::get('/deteteItem/{id}','ItemController@deteteItem');

Route::get('/updateItem/{id}','ItemController@updateItem');


Route::get('/', 'pagesController@index')->name('index');

Route::get('/home/{id}', 'pagesController@home')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home/{role}', 'pagesController@home')->name('role');


//Auth::routes();

Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
