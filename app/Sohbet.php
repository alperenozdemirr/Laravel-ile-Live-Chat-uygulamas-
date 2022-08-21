<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sohbet extends Model
{
    protected $table='sohbet';

    public function User(){
         return $this->hasOne('App\Users','id','kullanici_id');
    }
}
