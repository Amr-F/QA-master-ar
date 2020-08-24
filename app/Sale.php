<?php

namespace App;
use App\Invoice;
use App\Cash;
use App\AccountReceivable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    protected $fillable = ['customer_id','cash','invoice_date','invoice_numb','total'];

    public static function getInvoiceNumber()
    {
        $saleNumb = 0 ;
        $query = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = \'". env('DB_DATABASE') ."\' AND TABLE_NAME = 'sales'";
        $query = str_replace("\'", "'", $query);
        $table = DB::select($query);
        if (!empty($table)) {  $saleNumb = $table[0]->AUTO_INCREMENT; };
        $count = Sale::all()->count() + 1;
        $array = [ 'sale_numb' => $saleNumb, 'count' => $count]; 
        return $array;
    }

    public static function storeItem($data)
    {
        $sale = Sale::create($data['sale']);

        foreach($data['records'] as $record)
        {
            Invoice::create($record);
            $record['invoice_id'] = $sale->id;
            $item = Item::find($record['item_id']);
            $item->quantity -= $record['quantity'];
            $item->save();
        }
        $customer = Customer::find($data['customer_id']);
        $reason = 'Sale For '.$customer->name;
        $cash = Cash::create(['debit' => $data['cash'],'reason' => $reason]);
        $sale->cash_id = $cash->id;
        $sale->save();
        AccountReceivable::create(['payment_date'=> $data['sale']['invoice_date'],'customer_id' => $data['sale']['customer_id'],'debit' =>$data['credit'], 'sale_id' => $sale->id]);

    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class,'invoice_id','id');
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function credit()
    {
        return $this->hasOne(AccountReceivable::class,'sale_id','id');
    }

    public function cash()
    {
        return $this->belongsTo(Cash::class,'cash_id','id');
    }

    public static function getIncome($firstDate,$secondDate)
    {
        
        $sale = Sale::whereBetween('invoice_date',[$firstDate,$secondDate])->get();
        $total = 0;   
       $sale->each(function(Sale $sale) use(&$total)
        {
            $sale->invoices->each(function(Invoice $invoice) use(&$total)
            {
                $price = ( intval($invoice->price) - intval($invoice->item->purchase_price) ) * intval($invoice->quantity);
                $total += $price;
            });
        });
        return $total;
    }

}
