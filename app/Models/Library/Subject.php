<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'slug'];


     //== RELATIONSHIP
    //====================
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
