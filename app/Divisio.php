<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisio extends Model
{
    protected $fillable = ['name'];

    public function regnum()
    {
        return $this->belongsTo(Regnum::class);
    }

    public function classes()
    {
        return $this->hasMany(Classis::class);
    }
}
