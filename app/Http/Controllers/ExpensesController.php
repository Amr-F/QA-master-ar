<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Expcategory;
use App\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function __construct()
    {
        $this->middleware('redirectunAuth');
    }
    public function create (Expcategory $expcategory){
        return view ('expenses.create' ,compact('expcategory'));
    }
    public function store(Request $request){
        $data = $request->all();
        Expenses::create($data);
        $reason = 'paid '.$data['amount'];
        Cash::create(['credit' => $data['amount'],'reason' => $reason]);
        return redirect('/expenses/create');
    }


    public function index(){

        return view('expenses.index',['expense'=> Expenses::all()]);
    }

    public function show(Expenses $expense)
    {
        return view ('expenses.show' ,compact('expense'));

    }
    public function edit (Expcategory $expcategory ,Expenses $expense ){
        return view ('expenses.edit' , compact('expcategory','expense'));
    }

    public function update (Request $request){
        $data = $request->all();
        $data['id'] = $request->route('id');
        unset($data['_token']);
        unset($data['_method']);
        Expenses::where('id',$data['id'])->update($data);
        return redirect('/expenses'.'/'.$data['id']);
    }

    public function destroy($id){

        Expenses::find($id)->delete();
        return redirect('/expenses/index');
    }

}
