<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $casts = ['price'=>'float','quantity'=>'float'];

    protected $fillable = ['invoice_id','item_id', 'quantity','price'];

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id','id');
    }

    public function editInvoice($data)
    {
        if($data['quantity'] != $this->quantity)
        {
            $difference = $data['quantity'] - $this->quantity;
            $item = $this->item;
            $item->quantity -= $difference;
            $this->update($data);
            $this->save();
        }
    }

    public function deleteInvoice ()
    {
        $item = $this->item;
        $item->quantity += $this->quantity;
        $item->save();
    }

}
