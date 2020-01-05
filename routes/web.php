<?php

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
    $data = App\ITEM::orderby('catagory','asc')->orderby('item','asc')->get()->paginate(4);
    $topic = 'Item List';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/modules', function () {
    $data = App\ITEM::where('catagory','Modules & Sensors')->orderby('item','asc')->get()->paginate(4);
    $topic = 'Modules & Sensors';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/power', function () {
    $data = App\ITEM::where('catagory','Power Supplies')->orderby('item','asc')->get()->paginate(4);
    $topic = 'Power Supplies';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/accessories', function () {
    $data = App\ITEM::where('catagory','Accessories')->orderby('item','asc')->get()->paginate(4);
    $topic = 'Accessories';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/passive', function () {
    $data = App\ITEM::where('catagory','Passive Components')->orderby('item','asc')->get()->paginate(4);
    $topic = 'Passive Components';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});

Route::get('/electro', function () {
    $data = App\ITEM::where('catagory','Electromechanical')->orderby('item','asc')->get()->paginate(4);
    $topic = 'Electromechanical';
    return view('showtable')->with('tableData',$data)->with('topic',$topic);
});
Route::post('/saveItem','ItemController@store');


