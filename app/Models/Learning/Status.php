<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Task\Task;

class Status extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function pluckId()
    {
      return Status::count() > 0 ? Status::pluck('id')->random() : null;
    }

    public function scopeNotStarted($query)
    {
        $query->whereName('Not Started');
    }

    public function scopeInProgress($query)
    {
        $query->whereName('In Progress');
    }

    public function scopeCompleted($query)
    {
        $query->whereName('Completed');
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

     public function performances()
     {
         return $this->hasMany(DayResource::class);
     }
}
