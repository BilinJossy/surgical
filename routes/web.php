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



Route::get('/register', function () {
    return view('register');
});

Route::post('/login1', [customercontroller::class,'check']);

Route::post('/login2', [customercontroller::class,'check1']);

Route::post('/register1',[customercontroller::class,'store']);

route::get('/productlist1',[ShoppingController::class,'viewproduct1']);

route::get('/singleproduct1/{id}',[ShoppingController::class,'prdetails1']);

route::post('/search1',[ShoppingController::class,'searchproduct1']);

route::get('/about',[customercontroller::class,'about']);

route::get('/blog',[customercontroller::class,'blog']);

route::get('/singleblog',[customercontroller::class,'singleblog']);

route::get('/contact',[customercontroller::class,'contact']);

route::get('/elements',[customercontroller::class,'elements']);

// Route::get('/productlist', function () {
//     return view('productlist');
// });

Route::get('/sessiondelete',function(){
    if(session()->has('sname'))
    {
        session()->pull('sname');
    }
    return view('index');
});

Route::group(['middleware'=>['LoginCheck']], function(){

// Route::get('/cart', function () {
//     return view('cart');
// });

//Route::get('/Acategory',[CategoryController::class,'create']);
Route::get('/index', [customercontroller::class,'ind']);

route::get('/Cblog',[customercontroller::class,'blog1']);

Route::get('/Ahome',[CategoryController::class,'home']);

Route::get('/Acategory', [CategoryController::class,'category']);

Route::get('/Abrand', [CategoryController::class,'brand']);

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

route::get('/Myorders',[ShoppingController::class,'vieworder']);

route::get('/feedback/{id}',[ShoppingController::class,'Cfeedback']);

route::post('/feedback1/{id}',[ShoppingController::class,'SCfeedback']);

route::get('/Aviewfeedback',[CategoryController::class,'viewfeed']);

route::post('/Aviewreport',[CategoryController::class,'getreport']);

route::get('/Aviewreport',[CategoryController::class,'vieworder']);

route::post('/search',[ShoppingController::class,'searchproduct']);

route::get('/Myprofile',[CategoryController::class,'profile']);

route::get('/editprofile/{id}',[CategoryController::class,'editprofile']);

route::post('/customereditprocess/{id}',[CategoryController::class,'updateprofile']);


});