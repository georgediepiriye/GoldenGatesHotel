<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class AdminRoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roomtypes= RoomType::all();
        return view('admin.room-types',[
            'roomtypes'=> $roomtypes
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
        return view('admin.create-room-type');
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
            'details' =>'required',
            'price'=>'required|numeric',
   
        ]);
        $roomtype = new RoomType();
        $roomtype->title = $request->title;
        $roomtype->details = $request->details;
        $roomtype->price = $request->price;
        $roomtype->save();
        session()->flash('message','New Room type created Successfully!');
        return redirect()->route('admin.roomtypes');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($roomtype_id)
    {
        //
        $roomtype = RoomType::where('id',$roomtype_id)->first();
        return view('admin.show-room-type',['roomtype'=>$roomtype]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($roomtype_id)
    {
        //
        $roomtype = RoomType::where('id',$roomtype_id)->first();
        return view('admin.edit-room-type',['roomtype'=>$roomtype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $roomtype_id)
    {
        //
        $roomtype =  RoomType::find($roomtype_id);
        $roomtype->title = $request->title;
        $roomtype->details = $request->details;
        $roomtype->price = $request->price;
        $roomtype->save();
        session()->flash('message','Room type updated Successfully!');
        return redirect()->route('admin.roomtypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($roomtype_id)
    {
        //
        $roomtype = RoomType::find($roomtype_id);
        $roomtype->delete();
        return redirect()->route('admin.roomtypes')->with('message','Roomtype Deleted Successfully');
    }
}