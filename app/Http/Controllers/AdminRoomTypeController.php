<?php

namespace App\Http\Controllers;

use App\Models\RoomType;

use App\Models\RoomTypeImage;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

        foreach($request->file('images') as $image){
            $uploadedFileUrl1 = Cloudinary::upload($image->getRealPath())->getSecurePath();
            $imageData = new RoomTypeImage();
            $imageData->room_type_id= $roomtype->id;
            $imageData->image_src= $uploadedFileUrl1;
            $imageData->image_alt = $roomtype->title;
            $imageData->save();
        }

        session()->flash('message','Room type created Successfully!');
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
     

        if($request->hasFile('images')){

        
            foreach($request->file('images') as $image){
                $uploadedFileUrl1 = Cloudinary::upload($image->getRealPath())->getSecurePath();
                $imageData = new RoomTypeImage();
                $imageData->room_type_id= $roomtype->id;
                $imageData->image_src= $uploadedFileUrl1;
                $imageData->image_alt = $roomtype->title;
                $imageData->save();
            }
        }
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

    public function destroyImage($image_id)
    {
        $roomtypeImage = RoomTypeImage::find($image_id);
        $roomtypeImage->delete();
        return response()->json(['bool'=>true]);
    }
}
