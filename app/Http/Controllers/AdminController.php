<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function login(){
        return view('login');
    }

    public function check_login(Request $request){
        $request->validate([
            'username' => 'required',
            'password'=>'required',

        ]);
        $admin = Admin::where(['username'=>$request->username,'password'=>($request->password)])
        ->count();
        if($admin>0){
            $adminData = Admin::where(['username'=>$request->username,'password'=>($request->password)])
            ->get();
            session(['adminData'=>$adminData]);
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login')->with('message','Invalid Username/Password!!');
        }
      
    }
}
