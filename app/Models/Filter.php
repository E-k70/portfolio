<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = [
        'name',
    ];

    public function outfits()
    {
        return $this->hasMany(Outfit::class);
    }
}
