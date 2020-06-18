<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    protected $guarded =[];

    public $timestamps = false;

    public function book()
    {
        return $this->hasMany(book::class);
    }
}
