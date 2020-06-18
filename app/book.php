<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(author::class);
    }

    public function getCover()
    {
        if (substr($this->cover,0,5) == "https") {
            return $this->cover;
        }

        if ($this->cover){
            return asset('storage/app/public/'. $this->cover);
        }

        return 'https://via.placeholder.com/150x200.png?text=No+Images';
    }
}
