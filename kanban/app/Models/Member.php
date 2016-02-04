<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    public function boards()
    {
        return $this->hasMany('App\Models\Board');
    }
}
