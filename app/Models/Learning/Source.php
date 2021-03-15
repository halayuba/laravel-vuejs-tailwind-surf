<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function pluckId()
    {
      return Source::count() > 0 ? Source::pluck('id')->random() : null;
    }
}
