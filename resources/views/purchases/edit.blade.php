@extends('layouts.sidebar')
@extends('layouts.app')
<script src="/js/jquery.min.js"></script>
<script src="/js/ajaxCalls.js"></script>
<script src="/js/editPurchaseAjaxCalls.js"></script>

@section('content')


    <div id="app" class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">تعديل فاتورم مشتريات</h2>

            </div>
            <div   class="card-body">
                <form  method="POST" action="/purchases">



                    @csrf
                    <div  class="form-row">
                        <div class="name">اسم المورد</div>
                        <div class="value">
                            <div class="input-group">


                                <select class="input--style-5" name="supplier_name" required>
                                    <option disabled="disabled">اختر اسم المورد</option>

                                    @foreach($suppliers as $sup)
                                        <option value="{{$supplier->id}}" @if ($sup->id == $supplier->id)selected="selected"@endif>{{$supplier->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">التاريخ</div>
                        <div class="value">
                            <div class="input-group">
                                <input id="names" value="{{$purchase->bill_date}}" class="input--style-5" ata-input="true" type="date"  name="bill_date" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">رقم الفاتوره</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5"  type="bill_numb" name="bill_numb" value="{{$counter}}" readonly >
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>الكود</th>
                            <th>الاسم</th>
                            <th>الكميه</th>
                            <th>السعر</th>
                            <th>الاجمالي</th>
                            <th>حذف</th>

                        </tr>
                        </thead>
                        <tbody id="records">

                        @foreach ($bills as $bill)

                        <tr>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="code" id="code" value="{{$bill->item->id}}" name="code" required>
                                    </div>
                                </div></td>


                            <td><div class="form-row">
                                    <div class="input-group">
                                        <select class="input--style-5" name="item_name" required>
                                            <option name="select" disabled="disabled">اختر الصنف</option>

                                            @foreach($items as $item)
                                                <option value="{{$item->id}}" @if ($item->id == $bill->item->id) selected="selected" @endif>{{$item->name}}</option>
                                            @endforeach

                                        </select>
                                        <div id="list">
                                        </div>
                                    </div>
                                </div></td>

                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" id="quantity" value="{{$bill->quantity}}" type="quantity" name="quantity" required>
                                    </div>
                                </div></td>

                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="price" id="purchase_price" value="{{$bill->price}}" name="purchase_price" required>
                                    </div>
                                </div></td>

                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" id="total" type="total" name="total" value="{{ $bill->price * $bill->quantity}}" required>
                                    </div>
                                </div></td>

                            <td>        <button type="button" id="deleteRow" class="fa fa-window-close"></button> </td>



                        </tr>

                        @endforeach

                        </tbody>
                    </table>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>الاجمالي</th>
                            <th>النقدي</th>
                            <th>علي الحساب</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" value="{{$purchase->total}}" type="total_bill" name="total_bill" required>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" value="{{$cash->credit}}" type="cash" name="cash" required>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="credit" value="{{$credit->credit}}" name="credit" required>
                                    </div>
                                </div></td>
                        </tr>

                        </tbody>
                    </table>
                    <div>
                        <div class="text-center mb-5">
                            <button id="submit" class="btn btn--radius-2 btn--green">عدل</button>
                        </div>
                    </div>
                </form>
                <form method="POST" action="#">
                    @csrf
                    <div class="text-center mb-5">
                        <button class="btn btn--radius-2 btn--red" id="delete">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection







