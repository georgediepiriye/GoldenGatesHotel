<?php

namespace App\Http\Livewire\Admin;

use App\Models\Room;
use App\Models\RoomType;
use Livewire\Component;

class AdminEditRoomComponent extends Component
{

    public $roomtype_id,$room_id,$title;

    public function mount($room_id){
        $room= Room::where('id',$room_id)->first();
        $this->room_id = $room->id;
        $this->title = $room->title;
       
    
    }
    
    public function updated($fields){
        $this->validateOnly($fields,[
            'title'=> 'required',
            'roomtype_id' => 'required'
        ]);
    }
    
    public function updateRoom(){
        $this->validate([
            'title'=> 'required',
            'roomtype_id' => 'required'
    
        ]);
        $room= Room::find($this->room_id);
        $room->title = $this->title;
        $room->room_types_id = $this->roomtype_id;
        $room->save();
        session()->flash('message','Room Updated Successfully');
    }

    public function render()
    {   $roomtypes = RoomType::all();
        $room = Room::where('id',$this->room_id)->first();
        return view('livewire.admin.admin-edit-room-component',[
            'room'=>$room,
            'roomtypes'=>$roomtypes
        ])->layout('layouts.adminbase');
    }
}
