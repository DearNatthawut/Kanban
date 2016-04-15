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
        /*$this->belongsTo(\App\Models\Membermanagement::class,"MemberManagements_id","Members_id");*/
        return $this->belongsTo(\App\Models\User::class,"MemberManagement_id","id");
    }



}
