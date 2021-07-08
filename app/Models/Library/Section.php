<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['note', 'is_important', 'complete_by', 'completed_on', 'book_id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
