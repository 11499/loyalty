<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\managercontroller;
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

Route::get('/adminindex',[admincontroller::class,'adminindex']);
Route::get('/addabout',[admincontroller::class,'addabout']);
Route::get('/viewabout',[admincontroller::class,'viewabout']);
Route::get('/viewmessage',[admincontroller::class,'viewmessage']);
Route::get('/addgallery',[admincontroller::class,'addgallery']);
Route::get('/viewgallery',[admincontroller::class,'viewgallery']);
Route::get('/shop',[admincontroller::class,'shop']);
Route::get('/adminviewuser',[admincontroller::class,'viewuser']);
Route::get('/viewmanager',[admincontroller::class,'viewmanager']);
Route::post('/aboutaction',[admincontroller::class,'aboutaction']);
Route::get('/deleteabout/{id}',[admincontroller::class,'deleteabout']);
Route::get('/editabout/{id}',[admincontroller::class,'editabout']);
Route::post('/editaboutaction/{id}',[admincontroller::class,'editaboutaction']);
Route::post('/galleryaction',[admincontroller::class,'galleryaction']);
Route::get('/deletegallery/{id}',[admincontroller::class,'deletegallery']);
Route::get('/editgallery/{id}',[admincontroller::class,'editgallery']);
Route::post('/editgalleryaction/{id}',[admincontroller::class,'editgalleryaction']);
Route::post('/shopaction',[admincontroller::class,'shopaction']);
Route::get('/viewshops',[admincontroller::class,'viewshops']);
Route::get('/viewshopdetails',[admincontroller::class,'viewshopdetails']);
Route::get('/deleteshop/{id}',[admincontroller::class,'deleteshop']);
Route::get('/adminlogin',[admincontroller::class,'adminlogin']);
Route::get('/adminvieworder',[admincontroller::class,'adminvieworder']);
Route::post('/adminloginaction',[admincontroller::class,'adminloginaction']);
Route::post('/shopassignaction/{id}',[admincontroller::class,'shopassignaction']);
Route::get('/assignshop/{id}',[admincontroller::class,'assignshop']);



Route::get('/managerindex',[managercontroller::class,'managerindex']);
Route::get('/sampleindex',[managercontroller::class,'sampleindex']);
Route::get('/addproduct',[managercontroller::class,'addproduct']);
Route::get('/viewproduct',[managercontroller::class,'viewproduct']);
Route::get('/viewuser',[managercontroller::class,'viewuser']);
Route::get('/viewshop',[managercontroller::class,'viewshop']);
Route::get('/vieworder',[managercontroller::class,'vieworder']);
Route::post('/productaction',[managercontroller::class,'productaction']);
Route::get('/deleteproduct/{id}',[managercontroller::class,'deleteproduct']);
Route::get('/editproduct/{id}',[managercontroller::class,'editproduct']);
Route::post('/editproductaction/{id}',[managercontroller::class,'editproductaction']);
Route::post('/managerregaction',[managercontroller::class,'managerregaction']);
Route::get('/managerlogin',[managercontroller::class,'managerlogin']);
Route::post('/managerloginaction',[managercontroller::class,'managerloginaction']);
Route::post('/meditprofile/{id}',[managercontroller::class,'meditprofile']);
Route::get('/mprofile',[managercontroller::class,'mprofile']);
Route::get('/logout',[managercontroller::class,'logout']);

Route::get('/userindex',[usercontroller::class,'userindex']);
Route::get('/userpage',[usercontroller::class,'userpage']);
Route::get('/query',[usercontroller::class,'query']);
Route::get('/cart',[usercontroller::class,'cart']);
Route::post('/editprofile/{id}',[usercontroller::class,'editprofile']);
Route::get('/profile',[usercontroller::class,'profile']);
Route::get('/managerreg',[usercontroller::class,'managerreg']);
Route::get('/userreg',[usercontroller::class,'userreg']);
Route::get('/userlogin',[usercontroller::class,'userlogin']);
Route::post('/userregaction',[usercontroller::class,'userregaction']);
Route::post('/userloginaction',[usercontroller::class,'userloginaction']);
Route::get('/logout',[usercontroller::class,'logout']);
Route::get('/about',[usercontroller::class,'about']);
Route::get('/contact',[usercontroller::class,'contact']);
Route::get('/tgallery',[usercontroller::class,'tgallery']);
Route::post('/addcontact',[usercontroller::class,'addcontact']);
Route::get('/singleproduct/{id}',[usercontroller::class,'singleproduct']);
Route::post('/addtocart/{id}',[usercontroller::class,'addtocart']);
Route::get('/deletecart/{id}',[usercontroller::class,'deletecart']);
Route::get('/buynow',[usercontroller::class,'buynow']);
Route::get('/prize',[usercontroller::class,'prize']);
Route::post('/order',[usercontroller::class,'order']);
Route::get('/uservieworder',[usercontroller::class,'vieworder']);
Route::get('/bookcard/{total}',[usercontroller::class,'bookcard']);
Route::post('/paymentaction/{gtotal}',[usercontroller::class,'paymentaction']);
Route::get('/bookcredit/{gtotal}',[usercontroller::class,'bookcredit']);
Route::get('/paymentsful',[usercontroller::class,'paymentsful']);