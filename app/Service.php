<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['customer_id','name','date','service_price','service_cost'];
    
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public static function getIncome($firstDate,$secondDate)
    {
        $total = 0;
        $service = Service::whereBetween('date',[$firstDate,$secondDate])->get();
        $service->each(function(Service $service) use (&$total)
        {
            $price = $service->service_price - $service->service_cost;
            $total += $price;
        });
        return $total;
    }
}
