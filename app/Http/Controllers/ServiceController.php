<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Customer;
use App\Service;
use App\AccountReceivable;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
     public function __construct()
     {
        $this->middleware('redirectunAuth',['except' => ['store','create']]);
    }
    public function create (Customer $customer){
        return view ('services.create' ,compact('customer'));
    }


    public function store(Request $request){
        $data = $request->all();
        Service::create($data);
        $cash = intval($data['cash']);
        $name = ($data['name']);
        $customer_id =($data['customer_id']);
        $debit= ($data['credit']);
        $date= ($data['date']);
        $reason = 'Service ' . $name;
        Cash::create(['debit' => $cash,'reason' => $reason]);
        AccountReceivable::create( ['customer_id' => $customer_id , 'debit'=>$debit , 'credit'=> 0,'payment_date'=>$date ] );
        return redirect('/services/create');
    }

    public function index(){

        return view('services.index',['service'=> Service::all()]);
    }

    public function show(Service $service)
    {
        return view ('services.show' ,compact('service'));

    }
    public function edit (Service $service){
        return view ('services.edit' , compact('service'));
    }


    public function update (Request $request){
        $data = $request->all();
        $data['id'] = $request->route('id');
        unset($data['_token']);
        unset($data['_method']);
        Service::where('id',$data['id'])->update($data);
        return redirect('/services'.'/'.$data['id']);
    }

    public function destroy($id){

        Service::find($id)->delete();
        return redirect('/services/index');
    }

}
