<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Livewire\Admin\AdminCreateRoomTypeComponent;
use App\Http\Livewire\Admin\AdminCreateRoomComponent;
use App\Http\Livewire\Admin\AdminShowRoomTypeComponent;
use App\Http\Livewire\Admin\AdminEditRoomTypeComponent;
use App\Http\Livewire\Admin\AdminEditRoomComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminRoomTypeComponent;
use App\Http\Livewire\Admin\AdminRoomComponent;

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


//Admin
Route::get('admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
Route::get('admin/roomtype',AdminRoomTypeComponent::class)->name('admin.roomtypes');
Route::get('admin/roomtype/create',AdminCreateRoomTypeComponent::class)->name('admin.createroomtype');
Route::get('admin/roomtype/edit/{roomtype_id}',AdminEditRoomTypeComponent::class)->name('admin.edit.roomtype');
Route::get('admin/roomtype/show/{roomtype_id}',AdminShowRoomTypeComponent::class)->name('admin.show.roomtype');

Route::get('admin/rooms/create',AdminCreateRoomComponent::class)->name('admin.createroom');
Route::get('admin/rooms',AdminRoomComponent::class)->name('admin.rooms');
Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('admin/login',[AdminController::class,'check_login'])->name('admin.check_login');
Route::get('admin/rooms/edit/{room_id}',AdminEditRoomComponent::class)->name('admin.edit.room');


//customer
Route::get('admin/customers',[AdminCustomerController::class,'index'])->name('admin.customers');
Route::get('admin/customer/create',[AdminCustomerController::class,'create'])->name('admin.customer.create');
Route::post('admin/customer/create',[AdminCustomerController::class,'store'])->name('admin.customer.store');
Route::get('admin/customer/edit/{customer_id}',[AdminCustomerController::class,'edit'])->name('admin.customer.edit');
Route::get('admin/customer/show/{customer_id}',[AdminCustomerController::class,'show'])->name('admin.customer.show');
Route::post('admin/customer/update/{customer_id}',[AdminCustomerController::class,'update'])->name('update');
Route::get('admin/customer/delete/{customer_id}',[AdminCustomerController::class,'destroy'])->name('admin.customer.delete');