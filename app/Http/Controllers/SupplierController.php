<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Illuminate\Support\Facades\Validator;


class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('redirectunAuth');
    }

    public function index(){

        return view('suppliers.index',['supplier'=> \DB::table('suppliers')->paginate(10)]);
    }


    public function show (Supplier $supplier){
//        dd(compact('supplier'));
         return view ('suppliers.show' ,compact('supplier'));
    }


    public function create (){
        return view ('suppliers.create');
    }


    public function validateSupplierData($data,$type = 'create')
    {
        $rules =
        [
            'name'=>'required|unique:suppliers,name',
            'phone'=>'required'
        ];

        if($type == 'edit')
        {
            $rules['name'] .= ',' . $data['id'];
        }

        $messages =
        [
            'name.unique' => "This name already exists"
        ];


        $errors = valaditionData($data,$rules,$messages);

        return $errors;
    }

    public function store (Request $request){

        $data = $request->all();

        $errors = $this->validateSupplierData($data);

        if($errors != null)
        {
            return redirect('/suppliers/create')->with('data',$data)->withErrors($errors);
        }
        else
        {
            Supplier::create($data);
        }

        return redirect('/suppliers/index');

    }




    public function edit (Supplier $supplier)
    {
        return view ('suppliers.edit' , compact('supplier'));
    }

    public function update (Request $request){


        $data = $request->all();

        $data['id'] = $request->route('supplier');

        unset($data['_token']);

        unset($data['_method']);


        $errors = $this->validateSupplierData($data,'edit');


        if($errors != null)
        {
            return redirect('/' . 'suppliers' .'/'. $data['id'] . '/'.'edit')->with('supplier',$data)->withErrors($errors);
        }
        else
        {
            Supplier::where('id',$data['id'])->update($data);
        }

        return redirect('/suppliers/index');
    }

    public function destroy($id){

        Supplier::find($id)->delete();
        return redirect('/suppliers/index');
    }

}




