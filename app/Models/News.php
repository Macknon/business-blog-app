<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // a review belongsTo a user

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }

    //review belongsTo a category
    public function category()
    {
        # code...
        return $this->belongsTo(category::class);
    }

}
