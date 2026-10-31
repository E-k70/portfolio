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
}

