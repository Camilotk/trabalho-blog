<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $appends = [
        "formatted_post_date"
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function getFormattedPostDateAttribute()
    {
        return date('d/m/Y H:i:s', strtotime($this->post_date));
    }
}
