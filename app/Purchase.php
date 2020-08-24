<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bill;
use App\Cash;
use App\AccountPayable;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
    protected $fillable = ['supplier_id','cash','bill_date','bill_numb','total'];

    public static function getBillNumber()
    {
        $billNumb = 0 ;
        $query = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = \'". env('DB_DATABASE') ."\' AND TABLE_NAME = 'purchases'";
        $query = str_replace("\'", "'", $query);
        $table = DB::select($query);
        if (!empty($table)) {  $billNumb = $table[0]->AUTO_INCREMENT; };
        $count = Purchase::all()->count() + 1;
        return [ 'bill_numb' => $billNumb, 'count' => $count];
    }

    public static function storeItem($data)
    {
        $purchase = Purchase::create($data['purchase']);
        foreach($data['records'] as $record)
        {
            Bill::create($record);
            $record['bill_id'] = $purchase->id;
            $item = Item::find($record['item_id']);
            if($item->purchase_price != $record['price'])
            {
                $total_new = $record['price'] * $record['quantity'];
                $total_old = $item->purchase_price * $item->quantity;
                $new_Total = $total_new + $total_old;
                $new_quantity =  $record['quantity'] + $item->quantity;
                $newprice = round($new_Total / $new_quantity,3);
                $item->purchase_price = $newprice;
            }
            $item->quantity += $record['quantity'];
            $item->save();
        }
        $supplier = Supplier::find($data['supplier_id']);
        $reason = 'Purchase From '.$supplier->name;
        $cash = Cash::create(['credit' => $data['cash'],'reason' => $reason]);
        $purchase->cash_id = $cash->id;
        $purchase->save();
        AccountPayable::create(['payment_date'=> $data['purchase']['bill_date'],'supplier_id' => $data['purchase']['supplier_id'],'credit' =>$data['credit'] , 'purchase_id' => $purchase->id]);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class,'bill_id','id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    public function credit()
    {
        return $this->hasOne(AccountPayable::class,'purchase_id','id');
    }

    public function cash()
    {
        return $this->belongsTo(Cash::class,'cash_id','id');
    }


}
