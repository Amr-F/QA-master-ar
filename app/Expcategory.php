<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expcategory extends Model
{
    protected $table = "expcategory";
    protected $fillable = ['exp_name'];

    public function expenses(){
        return $this->hasMany(Expenses::class,'expense_id');

    }
}
