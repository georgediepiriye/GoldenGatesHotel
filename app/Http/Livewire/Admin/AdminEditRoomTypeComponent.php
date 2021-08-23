<?php

namespace App\Http\Livewire\Admin;

use App\Models\RoomType;
use Livewire\Component;

class AdminEditRoomTypeComponent extends Component
{

    public $roomtype_id,$title,$details;

    public function mount($roomtype_id){
        $roomtype = RoomType::where('id',$roomtype_id)->first();
        $this->roomtype_id = $roomtype->id;
        $this->title = $roomtype->title;
        $this->details = $roomtype->details;
    
    }
    
    public function updated($fields){
        $this->validateOnly($fields,[
            'title'=> 'required',
            'details' => 'required'
        ]);
    }
    
    public function updateRoomType(){
        $this->validate([
            'title'=> 'required',
            'details' => 'required'
    
        ]);
        $roomtype= RoomType::find($this->roomtype_id);
        $roomtype->title = $this->title;
        $roomtype->details = $this->details;
        $roomtype->save();
        session()->flash('message','Room type Updated Successfully');
    }

    public function render()
    {
        $roomtype = RoomType::where('id',$this->roomtype_id)->first();
        return view('livewire.admin.admin-edit-room-type-component',[
            'roomtype'=>$roomtype
        ])->layout('layouts.adminbase');
    }
}
