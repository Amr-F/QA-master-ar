<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','sale_price','purchase_price','quantity'];

    public static function createRecord($data)
    {
        $item = new Item();

        $item->name = $data['name'];
        $item->sale_price = intval($data['sale_price']);
        $item->purchase_price = intval($data['purchase_price']);
        $item->quantity = intval($data['quantity']);

        $item->save();

    }

    public static function getTotal()
    {
        $total = 0;
        Item::all()->each(function(Item $item) use (&$total)
        {
            $totalItem = intval($item->purchase_price) * intval($item->quantity);
            $total += $totalItem;
        });
        return $total;
    }
}


