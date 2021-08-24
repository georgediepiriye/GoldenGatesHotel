<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Room;

class AdminShowRoomComponent extends Component
{
    public $room_id,$title,$roomtype_id;
    public function mount($room_id){
        $room = Room::find($room_id);
        $room->id= $this->room_id;
    }
    public function render()
    {
        $room = Room::where('id',$this->room_id)->first();
        return view('livewire.admin.admin-show-room-component',[
            'room'=>$room
        ])->layout('layouts.adminbase');
    }
}
