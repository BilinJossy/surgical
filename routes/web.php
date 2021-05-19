<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customercontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShoppingController;

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
    return view('index');
});
Route::get('/login', function () {
    return view('login');
});

// Route::get('/productlist', function () {
//     return view('productlist');
// });

Route::get('/Ahome', function () {
    return view('Ahome');
});



Route::get('/Acategory', function () {
    return view('Acategory');
});

Route::get('/Abrand', function () {
    return view('Abrand');
});

Route::post('/login1', [customercontroller::class,'check']);

Route::get('/register', function () {
    return view('register');
});

// Route::get('/cart', function () {
//     return view('cart');
// });

Route::post('/register1',[customercontroller::class,'store']);

//Route::get('/Acategory',[CategoryController::class,'create']);

Route::post('/Acategory1',[CategoryController::class,'store']);

Route::post('/Abrand1',[CategoryController::class,'storebrand']);

Route::get('/Aproduct',[CategoryController::class,'index']);

Route::post('/Aproduct1',[CategoryController::class,'storeproduct']);

Route::get('/Aview',[CategoryController::class,'viewitem']);

route::get('/Aedit/{id}', [CategoryController::class,'edititem']);

route::post('/itemprocess/{id}', [CategoryController::class,'updateitem']);

route::get('/Adelete/{id}', [CategoryController::class,'deleteview']);

route::post('/itemdelete/{id}',[CategoryController::class,'destroyitem']);

route::get('/productlist',[ShoppingController::class,'viewproduct']);

route::get('/singleproduct/{id}',[ShoppingController::class,'prdetails']);

route::post('/addtocart',[ShoppingController::class,'addcart']);

route::get('/cart',[ShoppingController::class,'cartlist']);

route::get('/removecart/{id}',[ShoppingController::class,'destroy']);

route::get('/checkout',[ShoppingController::class,'payment']);

route::post('/order',[ShoppingController::class,'order']);

route::get('/Aviewcat',[CategoryController::class,'viewcat']);
route::get('/Aeditcat/{id}', [CategoryController::class,'editcat']);
route::post('/catprocess/{id}', [CategoryController::class,'updatecat']);

route::get('/Aviewbrand',[CategoryController::class,'viewbrand']);
route::get('/Aeditbrand/{id}', [CategoryController::class,'editbrand']);
route::post('/brandprocess/{id}', [CategoryController::class,'updatebrand']);

route::get('/Aviewcust',[CategoryController::class,'viewcust']);

Route::get('/sessiondelete',function(){
    if(session()->has('sname'))
    {
        session()->pull('sname');
    }
    return view('index');
});//to delete a students session