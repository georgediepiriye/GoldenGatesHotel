<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Department;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class StaffController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staffs= Staff::all();
        return view('admin.staffs',[
            'staffs'=> $staffs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Department::all();
        return view('admin.create-staff',['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'full_name' => 'required',
            'department_id' =>'required',
            'photo'=>'required|mimes:jpeg,png,jpg|max:5048',
            'bio'=>'required',
            'salary_type'=>'required',
            'salary_amount'=>'required|numeric'
   
        ]);
        $staff = new Staff();
        $staff->full_name = $request->full_name;
        $staff->department_id = $request->department_id;
        $uploadedFileUrl1 = Cloudinary::upload($request->file('photo')->getRealPath())->getSecurePath();
        $staff->photo = $uploadedFileUrl1;
        $staff->bio = $request->bio;
        $staff->salary_type = $request->salary_type;
        $staff->salary_amount = $request->salary_amount;
        $staff->save();
        session()->flash('message','Staff created Successfully!');
        return redirect()->route('admin.staffs');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($staff_id)
    {
        //
        $staff = Staff::where('id',$staff_id)->first();
        return view('admin.show-staff',['staff'=>$staff]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($staff_id)
    {
        //
        $staff = Staff::where('id',$staff_id)->first();
        $departments = Department::all();
        return view('admin.edit-staff',[
            'staff'=>$staff,
            'departments'=>$departments

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $staff_id)
    {
        //
     
        $request->validate([
            'full_name' => 'required',
            'department_id' =>'required',
            'photo'=>'required|mimes:jpeg,png,jpg|max:5048',
            'bio'=>'required',
            'salary_type'=>'required',
            'salary_amount'=>'required|numeric'
   
        ]);
        $staff =  Staff::find($staff_id);
        $staff->full_name = $request->full_name;
        $staff->department_id = $request->department_id;

        if($request->hasFile('photo')){
            $uploadedFileUrl1 = Cloudinary::upload($photo->getRealPath())->getSecurePath();
            $staff->photo = $uploadedFileUrl1;
        }else{
            $staff->photo = $request->prev_photo;
        }
       
        $staff->bio = $request->bio;
        $staff->salary_type = $request->salary_type;
        $staff->salary_amount = $request->salary_amount;
        $staff->save();
        session()->flash('message','Staff updated Successfully!');
        return redirect()->route('admin.staffs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($staff_id)
    {
        //
        $staff = Staff::find($staff_id);
        $staff->delete();
        return redirect()->route('admin.staffs')->with('message','Staff Deleted Successfully');
    }

}
