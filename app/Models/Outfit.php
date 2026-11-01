<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    public function filter()
    {
        return $this->belongsTo(Filter::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likedBy()
    {
        return $this->belongsToMany(User::class, 'outfit_likes')->withTimestamps();
    }

    protected $fillable = ['title', 'description', 'image_url', 'filter_id'];
    protected $casts = ['active' => 'boolean',];
}

