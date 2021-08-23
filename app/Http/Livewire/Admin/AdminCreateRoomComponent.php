<?php

namespace App\Http\Livewire\Admin;

use App\Models\Room;
use App\Models\RoomType;
use Livewire\Component;

class AdminCreateRoomComponent extends Component
{
    public $title;
    public $roomtype_id;

    public function render()
    {
        $roomtypes = RoomType::all();
        return view('livewire.admin.admin-create-room-component',[
            'roomtypes'=>$roomtypes
        ])->layout('layouts.adminbase');
    }


    public function addRoom(){
          $this->validate([
             'title'=>'required',
             'roomtype_id'=>'required'
          ]);

          $room = new Room();
          $room->title = $this->title;
          $room->room_types_id = $this->roomtype_id;
          $room->save();
          session()->flash('message','Room created successfully');

    }
}
