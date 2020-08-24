<?php

namespace App\Http\Controllers;
use App\AccountPayable;
use App\Bill;
use App\Cash;
use Illuminate\Http\Request;
use App\Supplier;
use App\Purchase;
use App\Item;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
   public function __construct()
   {
       $this->middleware('redirectunAuth',['except' => ['getBillNumb','store','update']]);
   }
    public function create (Supplier $supplier , Purchase $purchase ,Item $item ){
        $item=Item::all()->sortBy('name');
        return view ('purchases.create', compact('supplier','purchase','item'));
    }

    public function store(Request $request){
        Purchase::storeItem($request->all());
        return response()->json();
    }

    public function show($id)
    {
        $purchase = Purchase::find($id);
        $counter = 0;
        $count = 0;
        Purchase::all()->each(function(Purchase $pur) use (&$counter,$count,$purchase)
        {
            $count += 1;
            if($pur->id == $purchase->id)
            {
                $counter = $count;
            }
        });
        $bills = $purchase->bills;
        $supplier = $purchase->supplier;
        $suppliers = Supplier::all();
        $items = Item::all();
        $credit = $purchase->credit;
        $cash = $purchase->cash;
        return view('/purchases/show' , compact('purchase','bills','supplier','suppliers','items','credit','cash','counter'));
    }

    public function index(){

        $purchases = Purchase::all();
        $counter = 0;
        return view('/purchases/index',compact('purchases','counter'));
    }

    public function edit ($id)
    {
        $purchase = Purchase::find($id);
        $bills = $purchase->bills;
        $counter = 0;
        $count = 0;
        Purchase::all()->each(function(Purchase $pur) use (&$counter,$count,$purchase)
        {
            $count += 1;
            if($pur->id == $purchase->id)
            {
                $counter = $count;
            }
        });
        $supplier = $purchase->supplier;
        $suppliers = Supplier::all();
        $items = Item::all();
        $credit = $purchase->credit;
        $cash = $purchase->cash;
        return view ('purchases.edit' , compact('purchase','bills','supplier','suppliers','items','credit','cash','counter'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $bills = $data['records'];
        $purchase = $data['purchase'];
        $id = $request->route('id');
        $purchaseModel = Purchase::find($id);
        $purchaseModel->update($purchase);
        $purchaseModel->bills->each(function(Bill $billModel) use ($bills)
        {
            $checked = false;
            foreach($bills as $bill)
            {
                if($bill['item_id'] == $billModel->item_id)
                {
                    $billModel->editBill($bill);
                    $checked = true;
                }
            }
            if($checked == false)
            {
                Bill::create($bill);
                $item = Item::find($bill['item_id']);
                $item->quantity += $bill['quantity'];
                $item->save();
            }
        });

        $purchaseModel->credit->update(['credit' => $data['credit'], 'supplier_id' => $purchase['supplier_id']]);
        $purchaseModel->cash->update(['credit' => $data['cash']]);
        return response()->json();
    }

    public function getPurchase($id)
    {
        $purchase = Purchase::find($id);
        return response()->json($purchase);
    }

    public function getBillNumb()
    {
       $numb = Purchase::getBillNumber();
       return response()->json($numb);
    }

    public function getBills(Request $request)
    {
        $id = $request->route('id');
        $purchase = Purchase::find($id);
        $bills = $purchase->bills->count();
        return response()->json($bills);
    }

    public function delete($id)
    {
        $purchase = Purchase::find($id);
        if($purchase->bills != null)
        {
            $purchase->bills->each(function(Bill $billModel)
            {
                $billModel->deleteBill();
            });
        }
        $purchase->cash->delete();
        $purchase->delete();
        return response()->json();
    }

    public function deleteBill(Request $request)
    {
        $id = $request->route('id');
        $data = $request->all();
        $purchase = Purchase::find($id);
        $bills = $purchase->bills;
        $bills->each(function(Bill $bill) use($data)
        {
            if($bill->item_id == $data['item_id'])
            {
                $bill->deleteBill();
                $bill->delete();
            }
        });
        return response()->json();
    }
}

