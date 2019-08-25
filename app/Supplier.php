<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'url'];

    public function species()
    {
        return $this->belongsToMany('App\Species');
    }
}
