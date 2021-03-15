<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Task\Task;

class Priority extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scopeMedium($query)
    {
        $query->whereName('Medium');
    }

    /* //====================
      //== RELATIONSHIPS
     //==================== */
     public function resources()
     {
         return $this->hasMany(Resource::class);
     }

     public function tasks()
     {
         return $this->hasMany(Task::class);
     }
}
