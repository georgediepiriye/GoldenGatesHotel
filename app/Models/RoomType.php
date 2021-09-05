<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    public function roomTypeImages(){
      return  $this->hasMany(RoomTypeImage::class,'room_type_id');
    }
}
