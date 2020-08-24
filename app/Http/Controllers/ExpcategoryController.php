<?php

namespace App\Http\Controllers;

use App\Expcategory;
use Illuminate\Http\Request;

class ExpcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('redirectunAuth');
    }

    public function create (){
        return view ('expensesCategories.create');
    }

    public function store(Request $request){
        $data = $request->all();
        Expcategory::create($data);
        return redirect('/expensesCategories/create');
    }

    public function index(){

        return view('expensesCategories.index',['expCategory'=>Expcategory::all()]);
    }

    public function show(Expcategory $expcategory)
    {


        return view ('expensesCategories.show' ,compact('expcategory'));

    }

    public function edit (Expcategory $expcategory){


        return view ('expensesCategories.edit' , compact('expcategory'));
    }



    public function update ($id)
    {
        $expcategory = Expcategory::find($id);
        $expcategory->update(request()->all());
        return redirect('/expensesCategories/index');
    }

    public function destroy($id){

        Expcategory::find($id)->delete();
        return redirect('/expensesCategories/index');
    }
}
