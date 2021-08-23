<?php

namespace App\Http\Livewire\Admin;

use App\Models\RoomType;
use Livewire\Component;

class AdminShowRoomTypeComponent extends Component
{
    public $roomtype_id,$title,$details;
    public function mount($roomtype_id){
        $roomtype = RoomType::find($roomtype_id);
        $roomtype->id= $this->roomtype_id;
    }
    public function render()
    {
        $roomtype = RoomType::where('id',$this->roomtype_id)->first();
        return view('livewire.admin.admin-show-room-type-component',[
            'roomtype'=>$roomtype
        ])->layout('layouts.adminbase');
    }
}
