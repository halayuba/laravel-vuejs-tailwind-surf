<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'parent_id'];

    public function scopeIsParent($query)
    {
        $query->whereNull('parent_id');
    }

     //== RELATIONSHIP
    //====================
    public function children()
    {
      return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }


}
