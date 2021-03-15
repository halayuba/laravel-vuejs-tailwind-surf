<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    // public function getNameOrderedAttribute($value)
    // {
    //   return
    // }

    /* //====================
      //== RELATIONSHIPS
     //==================== */
     public function resources()
     {
         return $this->hasMany(Resource::class);
     }
}
