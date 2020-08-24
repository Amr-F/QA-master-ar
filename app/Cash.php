<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    //

    protected $table = 'cash';
    protected $fillable = ['reason','debit','credit'];

    public static function getTotal()
    {
        $debit = Cash::all()->sum('debit');
        $credit = Cash::all()->sum('credit');
        $total = $debit - $credit;
        return $total;
    }
}
