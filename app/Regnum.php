<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regnum extends Model
{
    protected $fillable = ['name'];

    public function divisios()
    {
        return $this->hasMany(Divisio::class);
    }
}
