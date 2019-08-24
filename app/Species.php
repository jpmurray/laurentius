<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $fillable = ['name', 'name_en', 'name_fr'];

    public function genus()
    {
        return $this->belongsTo(Genus::class);
    }
}
