<?php

use App\Http\Controllers\AdminRoomTypeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\StaffDepartmentController;
use App\Http\Livewire\Admin\AdminCreateRoomComponent;
use App\Http\Livewire\Admin\AdminEditRoomComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
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
Route::get('admin/roomtypes',[AdminRoomTypeController::class,'index'])->name('admin.roomtypes');
Route::get('admin/roomtype/create',[AdminRoomTypeController::class,'create'])->name('admin.createroomtype');
Route::post('admin/roomtype/store',[AdminRoomTypeController::class,'store'])->name('admin.roomtype.store');
Route::get('admin/roomtype/edit/{roomtype_id}',[AdminRoomTypeController::class,'edit'])->name('admin.roomtype.edit');
Route::post('admin/roomtype/update/{roomtype_id}',[AdminRoomTypeController::class,'update'])->name('admin.roomtype.update');
Route::get('admin/roomtype/show/{roomtype_id}',[AdminRoomTypeController::class,'show'])->name('admin.show.roomtype');
Route::get('admin/roomtype/delete/{roomtype_id}',[AdminRoomTypeController::class,'destroy'])->name('admin.roomtype.delete');
Route::get('admin/roomtypeimage/delete/{image_id}',[AdminRoomTypeController::class,'destroyImage']);

Route::get('admin/rooms/create',AdminCreateRoomComponent::class)->name('admin.createroom');
Route::get('admin/rooms',AdminRoomComponent::class)->name('admin.rooms');
Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::post('admin/login',[AdminController::class,'check_login'])->name('admin.check_login');
Route::get('admin/rooms/edit/{room_id}',AdminEditRoomComponent::class)->name('admin.edit.room');


Route::get('admin/departments',[StaffDepartmentController::class,'index'])->name('admin.departments');
Route::get('admin/department/create',[StaffDepartmentController::class,'create'])->name('admin.department.create');
Route::post('admin/department/store',[StaffDepartmentController::class,'store'])->name('admin.department.store');
Route::get('admin/department/edit/{department_id}',[StaffDepartmentController::class,'edit'])->name('admin.department.edit');
Route::post('admin/department/update/{department_id}',[StaffDepartmentController::class,'update'])->name('admin.department.update');
Route::get('admin/department/show/{department_id}',[StaffDepartmentController::class,'show'])->name('admin.show.department');
Route::get('admin/roomtype/delete/{department_id}',[StaffDepartmentController::class,'destroy'])->name('admin.department.delete');



//customer
Route::get('admin/customers',[AdminCustomerController::class,'index'])->name('admin.customers');
Route::get('admin/customer/create',[AdminCustomerController::class,'create'])->name('admin.customer.create');
Route::post('admin/customer/create',[AdminCustomerController::class,'store'])->name('admin.customer.store');
Route::get('admin/customer/edit/{customer_id}',[AdminCustomerController::class,'edit'])->name('admin.customer.edit');
Route::get('admin/customer/show/{customer_id}',[AdminCustomerController::class,'show'])->name('admin.customer.show');
Route::post('admin/customer/update/{customer_id}',[AdminCustomerController::class,'update'])->name('update');
Route::get('admin/customer/delete/{customer_id}',[AdminCustomerController::class,'destroy'])->name('admin.customer.delete');


//staff
Route::get('admin/staffs',[StaffController::class,'index'])->name('admin.staffs');
Route::get('admin/staff/create',[StaffController::class,'create'])->name('admin.staff.create');
Route::post('admin/staff/create',[StaffController::class,'store'])->name('admin.staff.store');
Route::get('admin/staff/edit/{staff_id}',[StaffController::class,'edit'])->name('admin.staff.edit');
Route::get('admin/staff/show/{staff_id}',[StaffController::class,'show'])->name('admin.staff.show');
Route::post('admin/staff/update/{staff_id}',[StaffController::class,'update'])->name('update');
Route::get('admin/staff/delete/{staff_id}',[StaffController::class,'destroy'])->name('admin.staff.delete');
