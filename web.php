<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('msg/{id}/{name?}',function($id,$name = null){   //must write /name in url  ->any name  , ?=>optional but must but default value to param
//     echo "my msg ".$name .$id;    //الي هيظهر هيتكتب هستقبله
// });//->where(['id'=>'[0-9]+']);     //apply condition on what you will write -> writen id in url must be integer 

// Route::get('Register', function () {
//     return view('reg');
// });

/*
or
Route::get('Register', 'reg');


*/

//Route::get('Message','App\Http\Controllers\usercontroller@message');   //access message function in controller must write namespace

//or from route service provider

//Route::get('Message','usercontroller@message');

// Route::get('Details/{name}/{age}','viewDetails@details');


// Route::get('create','viewDetails@create');
// Route::post('store','viewDetails@store');
// Route::get('student','viewDetails@index');
// Route::get('edit/{id}','viewDetails@edit');
// Route::post('update','viewDetails@update');
// Route::get('delete/{id}','viewDetails@delete');
// Route::get('login','viewDetails@login');
// Route::post('doLogin','viewDetails@doLogin');
// Route::get('logOut','viewDetails@logOut');


Route::resource('myToDo', 'toDo');
Route::get('login','toDo@login');
 Route::post('doLogin','toDo@doLogin');
 Route::get('logOut','toDo@logOut')->middleware('checkLogin');



















//Route::resource('Admins','adminControler');  //inside it 7 routes

//if method post as store(),he can distinguish bet them , just write Admins
//Admins/{id}/edit  
//Admin -> if get open index if post open store
//Admins/{id} ->update if put , show if get , delete if delete method


