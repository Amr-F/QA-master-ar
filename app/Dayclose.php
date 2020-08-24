<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dayclose extends Model
{
    protected $table = 'dayclose';

    protected $fillable = ['amount'];

    public static function insertRecord()
    {
        $debit = Cash::all()->sum('debit');
        $credit = Cash::all()->sum('credit');
        $total = $debit - $credit;
        $count = Dayclose::all()->count();
        if($count == 0)
        {
           Dayclose::create(['amount' => $total]); 
        }        
        else
        {
            $post = Dayclose::orderBy('id', 'DESC')->first()->amount;
            $total = $total - $post;
            Dayclose::create(['amount' => $total]); 
        }
        return $total;
    }

    public static function getDayClose()
    {
        $debit = Cash::all()->sum('debit');
        $credit = Cash::all()->sum('credit');
        $total = $debit - $credit;
        $count = Dayclose::all()->count();

        if($count != 0)
        {
            $post = Dayclose::orderBy('id', 'DESC')->first()->amount;
            $total = $total - $post;
        }
        return $total;
    } 
}
