<?php

namespace App\Http\Livewire\Admin;

use App\Models\RoomType;
use Livewire\Component;

class AdminRoomTypeComponent extends Component
{
    public function render()
    {
        $roomtypes= RoomType::all();
        return view('livewire.admin.admin-room-type-component',[
            'roomtypes'=>$roomtypes
        ])->layout('layouts.adminbase');
    }

    public function deleteRoomType($id){
        $roomtype = RoomType::where('id',$id)->first();
        $roomtype->delete();
        session()->flash('message',"Room type Deleted Successfully!");

    }

  
}
