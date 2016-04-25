<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 4/25/2016
 * Time: 2:00 AM
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PreCard extends Model
{
    protected $table = 'precards';
    //protected $fillable = ['detail'];

    public function preCard()
    {
        return $this->hasOne(\App\Models\Card::class,"id","id_Precards")
        ->select('id','status_id');
    }

}