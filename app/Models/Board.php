<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = 'boards';

    public function members()
    {
        return $this->belongsToMany(\App\Models\User::class,"membermanagement","Boards_id","Members_id");
    }

    public function manager()
    {
        return $this->hasOne(\App\Models\User::class,"id","manager_id");
    }

    public function cards(){
        return $this->hasMany(\App\Models\Card::class,"Boards_id");
    }
}
