<?php

namespace App\Http\Livewire\Admin;

use App\Models\RoomType;
use Livewire\Component;

class AdminCreateRoomTypeComponent extends Component
{
    public $title;
    public $details;
    public function render()
    {
        return view('livewire.admin.admin-create-room-type-component')->layout('layouts.adminbase');
    }


    public function addRoomType(){
          $this->validate([
             'title'=>'required',
             'details' => 'required'
          ]);

          $roomType = new RoomType();
          $roomType->title = $this->title;
          $roomType->details = $this->details;
          $roomType->save();
          session()->flash('message','Room type created successfully');

    }
}
