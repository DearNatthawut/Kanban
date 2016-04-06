<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 3/2/2016
 * Time: 11:05 PM
 * Card Model
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';

    public function checklist(){
        return $this->hasMany(\App\Models\Checklist::class,"Cards_id");
    }
    

    public function memberCard()
    {
        return $this->belongsTo(\App\Models\Member::class,"MemberManagements_id","id");
    }



}
