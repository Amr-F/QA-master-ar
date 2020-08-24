<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','phone'];

    public function accountReceivable(){
        return $this->hasMany(AccountReceivable::class,'customer_id');

    }
    public function service(){
        return $this->hasMany(Service::class,'customer_id');

    }
}
