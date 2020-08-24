<?php

namespace App\Http\Controllers;
use App\AccountReceivable;
use App\Cash;
use App\Customer;
use Illuminate\Http\Request;

class AccountReceivableController extends Controller
{
    public function __construct()
    {
        $this->middleware('redirectunAuth');
    }
    public function index(){
        $accountReceivables = [];

        Customer::All()->each(function(Customer $customer) use(&$accountReceivables)
        {
            $sumCredit = $customer->accountReceivable()->get()->sum('credit');
            $sumDebit = $customer->accountReceivable()->get()->sum('debit');
            $amount=$sumDebit-$sumCredit;
            $accountSup = ['id' => $customer->id,'name' => $customer->name,'credit' => $amount];
            array_push($accountReceivables,$accountSup);
        });
        $totalar=( AccountReceivable::all()->sum('debit'))-(AccountReceivable::all()->sum('credit'));
        return view('accountReceivables.index',compact('totalar'))->with('accountReceivables',$accountReceivables);
    }




    public function show( $accountReceivables)
    {
        $customer= Customer::all()->where('id',$accountReceivables);
        $accountReceivable = AccountReceivable::all()->where('customer_id', $accountReceivables)->sortByDesc('date');

        $total_debit=AccountReceivable::all()->where('customer_id', $accountReceivables)->sum('debit');
        $total_credit=AccountReceivable::all()->where('customer_id', $accountReceivables)->sum('credit');

        $total=$total_debit-$total_credit;

        return view ('accountReceivables.show' ,compact('accountReceivable','customer','total' ));
    }


    public function edit ( $accountReceivables)
    {

        $accountReceivables= AccountReceivable::all()->where('id',$accountReceivables);


        return view ('accountReceivables.edit' , compact('accountReceivables'));
    }

    public function update ($id)
    {
        $accountReceivable = AccountReceivable::find($id);
        $accountReceivable->update(request()->all());
        return redirect('/accountReceivables/index');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $customer = $data['customer_name'];
        $credit = $data['amount'];
        AccountReceivable::create(['credit' => $credit,'customer_id'=>$customer,'payment_date' =>$data['payment_date']]);
        $customerModel = Customer::find($customer);
        $reason = $customerModel->name . ' paid '. $credit;
        Cash::create(['debit' => $data['amount'],'reason' => $reason]);
        return redirect('/accountReceivables/index');
    }

    public function create (Customer $customer ){
        return  view ('accountReceivables.create', compact('customer'));
    }




    public function destroy($id){

        AccountReceivable::find($id)->delete();
        return redirect('/accountReceivables/index');
    }
}
