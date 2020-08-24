<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('redirectunAuth');
    }

    public function validateCustomerData($data,$type = 'create')
    {
        $rules =
            [
                'name'=>'required|unique:customerS,name',
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
    public function index(){

        return view('customers.index',['customer'=> Customer::all()]);
    }


    public function show (Customer $customer){

        return view ('customers.show' ,compact('customer'));
    }


    public function create (){
        return view ('customers.create');
    }

    public function store (Request $request){

        $data = $request->all();

        $errors = $this->validateCustomerData($data);

        if($errors != null)
        {
            return redirect('/customers/create')->with('data',$data)->withErrors($errors);
        }
        else
        {
            Customer::create($data);
        }

        return redirect('/customers/index');

    }


    public function edit (Customer $customer){
        return view ('customers.edit' , compact('customer'));
    }

    public function update (Request $request){


        $data = $request->all();

        $data['id'] = $request->route('customer');

        unset($data['_token']);

        unset($data['_method']);


        $errors = $this->validateCustomerData($data,'edit');


        if($errors != null)
        {
            return redirect('/' . 'customers' .'/'. $data['id'] . '/'.'edit')->with('customer',$data)->withErrors($errors);
        }
        else
        {
            Customer::where('id',$data['id'])->update($data);
        }

        return redirect('/customers/index');
    }

    public function destroy($id){

        Customer::find($id)->delete();
        return redirect('/customers/index');
    }
}
