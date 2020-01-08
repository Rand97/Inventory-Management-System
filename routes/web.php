<?php
use Illuminate\Support\Facades\Request;
use App\ITEM;
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

Route::get('/', function () {
    
    return view('welcome');
});


Route::get('/add', function () {
    return view('addItems');
});

Route::get('/items', function () {
    $data = ITEM::orderby('catagory','asc')->orderby('item','asc')->get()->paginate(6);
    $topic = 'Item List';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/modules', function () {
    $data = ITEM::where('catagory','Modules & Sensors')->orderby('item','asc')->get()->paginate(6);
    $topic = 'Modules & Sensors';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/power', function () {
    $data = ITEM::where('catagory','Power Supplies')->orderby('item','asc')->get()->paginate(6);
    $topic = 'Power Supplies';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/accessories', function () {
    $data = ITEM::where('catagory','Accessories')->orderby('item','asc')->get()->paginate(6);
    $topic = 'Accessories';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/passive', function () {
    $data = ITEM::where('catagory','Passive Components')->orderby('item','asc')->get()->paginate(6);
    $topic = 'Passive Components';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/electro', function () {
    $data = ITEM::where('catagory','Electromechanical')->orderby('item','asc')->get()->paginate(6);
    $topic = 'Electromechanical';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::post('addItems_store', [
    'uses' => 'ItemController@store'
  ]);

Route::post('/search',function(){
    $searchFor = Request::get('searchitem');
    if($searchFor != ""){
        $searchResult = ITEM::where('item', 'LIKE' , '%' . $searchFor . '%')->orderBy('item','asc')->get()->paginate(6);
        if(count($searchResult) > 0){
            $topic = 'Search Results : ';
            return view('showtable')->with('tableData',$searchResult)->with('topic',$topic);
        }
        return view('welcome')->withMessage("No items found !!!");
    }
});

Route::get('/random/{id}','ItemController@RandomPage');
