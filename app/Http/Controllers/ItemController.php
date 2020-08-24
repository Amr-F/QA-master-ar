<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('redirectunAuth',['except' => ['getItem']]);
    }

    public function validateItemData($data,$type = 'create')
    {
        $rules =
            [
                'name'=>'required|unique:items,name',
                'sale_price'=>'required',
                'purchase_price'=>'required',
                'quantity'=>'required',
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

    public function index( $sort )
    {
        //Auth::guard('web')->user()->id;

            if ($sort == 1 ){
                return view('items.index', ['item' => Item::all()->sortBy('name')]);}
            elseif ($sort== 2){
                return view('items.index', ['item' => Item::all()->sortBy('id')]);}
            elseif ($sort==3){
                return view('items.index', ['item' => Item::all()->sortBy('quantity')]);}



    }

    public function getNames()
    {

        $names = Item::all()->map(function($item)
        {
             return ['id' => $item->id,'name' => $item->name];
        });

        return response()->json($names);
    }

    public function show(Item $item)
    {
        return view ('items.show' ,compact('item'));

    }


    public function create()
    {
        return view('items.create');
    }
    public function store (Request $request){

        $data = $request->all();

        $errors = $this->validateItemData($data);

        if($errors != null)
        {
            return redirect('/items/create')->with('data',$data)->withErrors($errors);
        }
        else
        {
            Item::createRecord($data);
        }

        return redirect('/items/index/1');

    }


    public function edit ( $item){

        return view('items.edit', ['item' => Item::where('id',intval($item))->first()]);
    }
    public function update (Request $request){


        $data = $request->all();

        $data['id'] = $request->route('item');

        unset($data['_token']);

        unset($data['_method']);


        $errors = $this->validateItemData($data,'edit');

        if($errors != null)
        {
//            dd($data);
            return redirect('/' . 'items' .'/'. $data['id'] . '/'.'edit')->with('item',$data)->withErrors($errors);
        }
        else
        {
            Item::where('id',$data['id'])->update($data);
        }

        return redirect('/items/index/1');
    }




    public function destroy($id){

        Item::find($id)->delete();
        return redirect('/items/index/1');
    }



    public function getItem ($id){
            $items = Item::find($id)->toArray();
            echo json_encode($items);
            exit;
    }



    function fetch(Request $request)
    {

        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('items')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
       <li><a href="#">'.$row->name.'</a></li>
       ';
            }
            $output .= '</ul>';
            echo json_encode($output);
        }
    }


}
