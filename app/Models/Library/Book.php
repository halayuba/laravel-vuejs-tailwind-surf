<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    protected $fillable = ['uuid', 'title', 'file', 'author', 'priority', 'publish_date', 'rating', 'pages', 'url'];

    protected $dates = ['publish_date'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public static function boot()
    {
      parent::boot();
      static::creating(function ($book) {
        $book->uuid = Str::uuid();
      });
    }

    public function scopeOrdered($query)
    {
        $query->orderBy('priority', 'desc')
              ->orderBy('publish_date', 'desc');
    }

    public function scopeIsDuplicate($query, $value)
    {
        $query->where('title', $value);
    }

    public function scopeImageExists($query, $value)
    {
        $query->where('file', $value)->exists();
    }

    public function imagePathName()
    {
      // return Storage::disk('local')->url('public/uploads/' . $this->file);
      return Storage::disk('books')->url($this->file);
      // return Storage::get('public/uploads/' . $this->file);
    }

    public function getImageAttribute()
    {
      return Storage::disk('books')->url($this->file);
      // return Storage::url('uploads/' . $this->file);
    }

    // public function imageNotDuplicate($image_name)
    // {
    //   return $this->imageExists($image_name)->count()? false : true;
    // }

    public function removeBookCover()
    {
      return $this->update(['file' => '']);
    }

     //== RELATIONSHIP
    //====================
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
        ->whereNull('parent_id')
        ->orderBy('created_at', 'desc'); //== OR LATEST()
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

}
