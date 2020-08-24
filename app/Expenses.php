<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{

    protected $fillable = ['date','amount','expense_id'];


    public function expcategory(){

        return $this->belongsTo(Expcategory::class,'expense_id');
    }

    public static function getTotal($firstDate,$secondDate)
    {
        $expense = Expenses::whereDate('date', '>=',$firstDate)
        ->whereDate('date', '<=',$secondDate)
        ->get()->sum('amount');
        return $expense;   
    }
}
