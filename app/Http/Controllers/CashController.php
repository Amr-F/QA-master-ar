<?php

namespace App\Http\Controllers;

use App\Cash;
use Illuminate\Http\Request;

class CashController extends Controller
{
    public function __construct()
    {
        $this->middleware('redirectunAuth');
    }

    public function index(){

        return view('cash.index',['cash'=> Cash::all()]);
    }

    public function show(Cash $cash)
    {
        return view ('cash.show' ,compact('cash'));

    }
    public function create (){
        return view ('cash.create' );
    }
    public function store(Request $request){
        $data = $request->all();
        Cash::create($data);
        return redirect('/cash/index');
    }

}
