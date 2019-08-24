<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classis extends Model
{
    protected $fillable = ['name'];

    public function divisio()
    {
        return $this->belongsTo(Divisio::class);
    }

    public function ordos()
    {
        return $this->hasMany(Ordo::class);
    }
}
