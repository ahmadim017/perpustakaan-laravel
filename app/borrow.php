<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\book;

class borrow extends Model
{
    protected $table = "pinjam_history";

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function admin()
    {
        return $this->belongsTo(User::class, 'id', 'admin_id');
    }
    public function book()
    {
        return $this->belongsTo(book::class);
    }

    public function dipinjam($query)
    {
        return $query->where('return_at',NULL);
    }
}
