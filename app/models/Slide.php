<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Slide extends Model
{
    protected $fillable = ['title' , 'image'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
