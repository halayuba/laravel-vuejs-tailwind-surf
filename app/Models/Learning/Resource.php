<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PM\Performance;


class Resource extends Model
{
    use HasFactory;

    public static function boot()
    {
      parent::boot();
      static::creating(function ($resource) {

        /* == ID FOR NOT STARTED STATUS == */
        $resource->status_id = Status::notStarted()->first()->id;
      });
    }

    public function scopeOrdered($query)
    {
        $query->orderBy('priority_id', 'desc');
    }

    /* == THE TBL STRUCTURE WILL BE CHANGED AND THE FOLLOWING WILL BE MODIFIED == */
    public function toggleCompleted()
    {
      /* == IDENTIFY STATUSES == */
      $completedID = Status::where('name', 'Completed')->first()->id;
      $inProgressID = Status::where('name', 'In Progress')->first()->id;

      /* == IF CURRENT STATUS IS "Completed" THEN UPDATE TO "In Progress" == */
      if( $this->status_id === $completedID )
      {
        $this->update([
          'status_id' => $inProgressID
        ]);
      }
      /* == IF CURRENT STATUS IS NOT "Completed" THEN UPDATE TO "Completed" == */
      else
      {
        $this->update([
          'status_id' => $completedID
        ]);
      }
/*
     //== THE TBL STRUCTURE WILL BE UPDATED AND THE FOLLOWING ATTRIBUTES WILL BE REMOVED
    //====================
      if( $this->percentage_completed === 100 ){
        return $this->update([
          'percentage_completed' => 50,
          'completed_at' => null,
          'status_id' => 4
        ]);
      }
      else
      {
        return $this->update([
          'percentage_completed' => 100,
          'completed_at' => now(),
          'status_id' => 1
        ]);
      }
*/
    }

    /* //====================
      //== RELATIONSHIPS
     //==================== */
     public function source()
     {
         return $this->belongsTo(Source::class);
     }

     public function type()
     {
         return $this->belongsTo(Type::class);
     }

     public function status()
     {
         return $this->belongsTo(Status::class);
     }

     public function priority()
     {
         return $this->belongsTo(Priority::class);
     }

     /* == NEXT RELEASE == */
     public function activities()
     {
       return $this->morphMany(Performance::class, 'activity')->latest();
     }
}
