<?php

use App\Http\Livewire\Admin\AdminCreateRoomTypeComponent;
use App\Http\Livewire\Admin\AdminCreateRoomComponent;
use App\Http\Livewire\Admin\AdminShowRoomTypeComponent;
use App\Http\Livewire\Admin\AdminEditRoomTypeComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminRoomTypeComponent;
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
Route::get('admin/roomtypes',AdminRoomTypeComponent::class)->name('admin.roomtypes');
Route::get('admin/create-roomtype',AdminCreateRoomTypeComponent::class)->name('admin.createroomtype');
Route::get('admin/edit-roomtype/{roomtype_id}',AdminEditRoomTypeComponent::class)->name('admin.edit.roomtype');
Route::get('admin/show-roomtype/{roomtype_id}',AdminShowRoomTypeComponent::class)->name('admin.show.roomtype');

Route::get('admin/create-room',AdminCreateRoomComponent::class)->name('admin.createroom');