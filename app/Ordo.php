<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordo extends Model
{
    protected $fillable = ['name'];

    public function classis()
    {
        return $this->belongsTo(Classis::class);
    }

    public function familias()
    {
        return $this->hasMany(Familia::class);
    }
}
