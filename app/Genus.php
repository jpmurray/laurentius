<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genus extends Model
{
    protected $fillable = ['name'];

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }

    public function species()
    {
        return $this->hasMany(Species::class);
    }
}
