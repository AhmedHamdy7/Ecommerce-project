<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Models\product;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
// });


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware([
        'IsAdmin'
    ])->group(function () {
        Route::get('/addProduct',[AdminController::class,'addProduct']);
        Route::get('/showProduct',[AdminController::class,'showProduct']);
        Route::get('/updateView/{id}',[AdminController::class,'updateView']);
        Route::post('/UpdateProduct/{id}',[AdminController::class,'UpdateProduct']);
        Route::post('/uploadProduct',[AdminController::class , "uploadProduct"]);
        Route::get('/deleteProduct/{id}',[AdminController::class,'deleteProduct']);
    });

    Route::middleware([
        'IsUser'
    ])->group(function () {
        Route::get('/search',[HomeController::class,'search']);
        Route::post('/addcart/{id}',[HomeController::class,'addcart']);
        Route::get('/ShowCart',[HomeController::class,'ShowCart']);
        Route::get('/delete/{id}',[HomeController::class,'deleteCart']);
        Route::post('/order',[HomeController::class,'confirmorder']);
    });

    Route::get('/',[HomeController::class,'index']);
    Route::get('/redirect',[HomeController::class,'redirect']);

    // Route::get('/profile',[AdminController::class,'addProduct']);



















// Route::post('/uploadProduct', function(Request $request) {
//     $data = new product;

//         $image  = $request->file;
//         $imagename = time().'.'.$image->getClientOriginalExtension();
//         $request->file->move('productimage' , $imagename);
//         $data->image = $imagename;

//         $data->title = $request->title;
//         $data->price = $request->price;
//         $data->description = $request->desc;
//         $data->quantity = $request->quantity;

//         $data->save();

//         return redirect()->back()->with('message' , 'product added successfuly');
// });
