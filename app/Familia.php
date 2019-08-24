<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $fillable = ['name'];

    public function ordo()
    {
        return $this->belongsTo(Ordo::class);
    }

    public function genera()
    {
        return $this->hasMany(Genus::class);
    }
}
