<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use App\Customer;
use App\Sale;
use App\Item;

class SaleController extends Controller
{
   public function __construct()
   {
       $this->middleware('redirectunAuth',['except' => ['store','create','getInvoiceNumb','update','deleteInvoice','delete']]);
   }


    public function autocomplete(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('items')
            ->where('name', 'LIKE', '%'.$term.'%')->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->name ];
        }
        return Response::json($results);
    }



    public function create (Customer $customer , Sale $sale ,Item $item ){
        $item=Item::all()->sortBy('name');
        return view ('sales.create', compact('customer','sale','item'));
    }



    public function store(Request $request){
        Sale::storeItem($request->all());
        return response()->json();
    }

    public function show($id)
    {
        $sale = Sale::find($id);
        $invoices = $sale->invoices;
        $counter = 0;
        $count = 0;
        Sale::all()->each(function(Sale $sal) use (&$counter,$count,$sale)
        {
            $count += 1;
            if($sal->id == $sale->id)
            {
                $counter = $count;
            }
        });
        $customer = $sale->customer;
        $customers = Customer::all();
        $items = Item::all();
        $credit = $sale->credit;
        $cash = $sale->cash;
        return view('/sales/show' , compact('sale','invoices','customer','customers','items','credit','cash','counter'));
    }
    public function index(){
        $counter = 0;
        $sales = Sale::all();
        return view('/sales/index',compact('sales','counter'));
    }


    public function edit ($id)
    {
        $sale = Sale::find($id);
        $invoices = $sale->invoices;
        $counter = 0;
        $count = 0;
        Sale::all()->each(function(Sale $sal) use (&$counter,$count,$sale)
        {
            $count += 1;
            if($sal->id == $sale->id)
            {
                $counter = $count;
            }
        });
        $customer = $sale->customer;
        $customers = Customer::all();
        $items = Item::all();
        $credit = $sale->credit;
        $cash = $sale->cash;
        return view ('sales.edit' , compact('sale','invoices','customer','customers','items','credit','cash','counter'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $invoices = $data['records'];
        $sale = $data['sale'];
        $id = $request->route('id');
        $saleModel = Sale::find($id);
        $saleModel->update($sale);
        $saleModel->invoices->each(function(Invoice $invoiceModel) use ($invoices)
        {
            $checked = false;
            foreach($invoices as $invoice)
            {
                if($invoice['item_id'] == $invoiceModel->item_id)
                {
                    $invoiceModel->editInvoice($invoice);
                    $checked = true;
                }
            }
            if($checked == false)
            {
                Invoice::create($invoice);
                $item = Item::find($invoice['item_id']);
                $item->quantity -= $invoice['quantity'];
                $item->save();
            }
        });
        $saleModel->credit->update(['debit' => $data['credit'], 'customer_id' => $sale['customer_id']]);
        $saleModel->cash->update(['debit' => $data['cash']]);
        return response()->json();
    }

    public function getSale($id)
    {
        $sale = Sale::find($id);
        return response()->json($sale);
    }

    public function getInvoiceNumb()
    {
        $numb = Sale::getInvoiceNumber();
        return response()->json($numb);
    }

    public function getInvoices(Request $request)
    {
        $id = $request->route('id');
        $sale = Sale::find($id);
        $invoices = $sale->invoices->count();
        return response()->json($invoices);
    }

    public function delete($id)
    {
        $sale = Sale::find($id);

        if($sale->invoices != null)
        {

            $sale->invoices->each(function(Invoice $invoiceModel)
            {
                $invoiceModel->deleteInvoice();
            });
        }
        $sale->cash->delete();
        $sale->delete();
        return response()->json();
    }


    public function deleteInvoice(Request $request)
    {
        $id = $request->route('id');
        $data = $request->all();
        $sale = Sale::find($id);
        $invoices = $sale->invoices;
        $invoices->each(function(Invoice $invoice) use($data)
        {
            if($invoice->item_id == $data['item_id'])
            {
                $invoice->deleteInvoice();
                $invoice->delete();
            }
        });
        return response()->json();
    }

}
