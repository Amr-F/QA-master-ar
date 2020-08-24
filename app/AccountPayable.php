<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountPayable extends Model
{

    protected $table = "accountpayables";
    protected $fillable = ['supplier_id','debit','credit','payment_date','purchase_id'];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public static function getTotal()
    {
        $debit = AccountPayable::all()->sum('debit');
        $credit = AccountPayable::all()->sum('credit');
        $total = $debit - $credit;
        return $total;
    }
}
