<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = ['name', 'url', 'suggested_days', 'details'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
