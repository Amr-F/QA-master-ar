<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bill extends Model
{
    protected $table = 'bills';

    protected $casts = ['price'=>'float','quantity'=>'float'];

    protected $fillable = ['bill_id','item_id', 'quantity','price'];

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id','id');
    }

    public function editBill($data)
    {
        if($data['quantity'] != $this->quantity)
        {
            $difference = $data['quantity'] - $this->quantity;
            $item = $this->item;
            $item->quantity += $difference;
            $this->update($data);
            $this->save();
        }
    }

    public function deleteBill()
    {
        $item = $this->item;
        $item->quantity -= $this->quantity;
        $item->save();
    }
}
