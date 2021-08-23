<?php

namespace App\Http\Livewire\Admin;

use App\Models\Room;
use Livewire\Component;

class AdminRoomComponent extends Component
{
    public function render()
    {
        $rooms = Room::all();
        return view('livewire.admin.admin-room-component',[
            'rooms'=>$rooms
        ])->layout('layouts.adminbase');
    }

    public function deleteRoom($id){
        $room = Room::where('id',$id)->first();
        $room->delete();
        session()->flash('message',"Room Deleted Successfully!");

    }
}
