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

  
}
