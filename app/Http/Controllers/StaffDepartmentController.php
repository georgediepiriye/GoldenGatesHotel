<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class StaffDepartmentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments= Department::all();
        return view('admin.departments',[
            'departments'=> $departments
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
        return view('admin.create-department');
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
            'title' => 'required',
            'details' =>'required'
   
        ]);
        $department = new Department();
        $department->title = $request->title;
        $department->details = $request->details;
        $department->save();

        session()->flash('message','Staff Department created Successfully!');
        return redirect()->route('admin.departments');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($department_id)
    {
        //
        $department = Department::where('id',$department_id)->first();
        return view('admin.show-department',['department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($department_id)
    {
        //
        $department = Department::where('id',$department_id)->first();
        return view('admin.edit-department',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $department_id)
    {
        //
        $department =  Department::find($department_id);
        $department->title = $request->title;
        $department->details = $request->details;
        $department->save();
        session()->flash('message','Department updated Successfully!');
        return redirect()->route('admin.departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($department_id)
    {
        //
        $department = Department::find($department_id);
        $department->delete();
        return redirect()->route('admin.departments')->with('message','Department Deleted Successfully');
    }

}
