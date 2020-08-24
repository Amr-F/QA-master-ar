<?php

namespace App\Http\Controllers;
use App\AccountPayable;
use App\Cash;
use App\Supplier;
use Auth;
use Illuminate\Http\Request;

class AccountPayableController extends Controller
{


    public function __construct()
    {
        $this->middleware('redirectunAuth');
    }


//    public function getid (){
//
//    $id= Auth::guard('web')->user()->id;
//
//    if ($id !=1 ){
//        return view('layouts.yabash');
//    }
//    }

    public function index(){

        $accountPaybales = [];

        Supplier::All()->each(function(Supplier $supplier) use(&$accountPaybales)
        {
            $sumCredit = $supplier->accountPayable()->get()->sum('credit');
            $sumDebit = $supplier->accountPayable()->get()->sum('debit');
            $amount=$sumCredit-$sumDebit;
            $accountSup = ['id' => $supplier->id,'name' => $supplier->name,'credit' => $amount];
            array_push($accountPaybales,$accountSup);
        });
        $totalap=( AccountPayable::all()->sum('credit'))-(AccountPayable::all()->sum('debit'));
        return view('accountPayables.index',compact('totalap'))->with('accountPaybales',$accountPaybales);
    }




    public function show( $accountPaybales)
    {
        $supplier= Supplier::all()->where('id',$accountPaybales);
        $accountPaybale = AccountPayable::all()->where('supplier_id', $accountPaybales)->sortByDesc('date');

        $total_debit=AccountPayable::all()->where('supplier_id', $accountPaybales)->sum('debit');
        $total_credit=AccountPayable::all()->where('supplier_id', $accountPaybales)->sum('credit');

        $total=$total_credit-$total_debit;

        return view ('accountPayables.show' ,compact('accountPaybale','supplier','total' ));
    }


    public function edit ( $accountPaybales)
    {

      $accountPaybales= AccountPayable::all()->where('id',$accountPaybales);


        return view ('accountPayables.edit' , compact('accountPaybales'));
    }

    public function update ($id)
    {
        $accountPaybale = AccountPayable::find($id);
        $accountPaybale->update(request()->all());
        return redirect('/accountPayables/index');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $supplier = $data['supplier_name'];
        $debit = $data['amount'];
        AccountPayable::create(['debit' => $debit,'supplier_id'=>$supplier,'payment_date' =>$data['payment_date']]);
        $supplierModel = Supplier::find($supplier);
        $reason = 'We paid '. $debit . ' to '.$supplierModel->name;
        Cash::create(['credit' => $data['amount'],'reason' => $reason]);
        return redirect('/accountPayables/index');
    }

    public function create (Supplier $supplier ){
        return  view ('accountPayables.create', compact('supplier'));
    }




    public function destroy($id){

        AccountPayable::find($id)->delete();
        return redirect('/accountPayables/index');
    }
    }

