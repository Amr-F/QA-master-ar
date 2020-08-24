<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name','phone'];

    public function accountPayable(){
        return $this->hasMany(AccountPayable::class,'supplier_id');
    
    } 
}
