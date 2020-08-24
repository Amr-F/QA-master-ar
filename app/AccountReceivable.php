<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountReceivable extends Model
{
    protected $table = "accountreceivables";
    protected $fillable = ['customer_id','debit','credit','payment_date','sale_id'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public static function getTotal()
    {
        $debit = AccountReceivable::all()->sum('debit');
        $credit = AccountReceivable::all()->sum('credit');
        $total = $debit - $credit;
        return $total;
    }
}
