<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Membermanagement extends Model
{
    protected $table = 'membermanagements';

    public function member()
    {
        return $this->hasOne(\App\Models\Member::class,"id","Members_id");
    }

}
