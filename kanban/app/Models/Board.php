<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = 'boards';

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }
}
