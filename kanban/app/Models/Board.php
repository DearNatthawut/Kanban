<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = 'boards';

    public function members()
    {
        return $this->belongsToMany(\App\Models\Member::class,"membermanagements","boards_id","members_id");
    }

    public function cards(){
        return $this->hasMany(\App\Models\Card::class,"boards_id");
    }
}
