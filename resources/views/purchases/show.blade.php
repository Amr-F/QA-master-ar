@extends('layouts.sidebar')
@extends('layouts.app')
<script src="/js/jquery.min.js"></script>

@section('content')


    <div id="app" class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عرض فاتوره</h2>

            </div>
            <div   class="card-body">
                <form  method="POST" action="/purchases">



                    @csrf
                    <div  class="form-row">
                        <div class="name">اسم المورد</div>
                        <div class="value">
                            <div class="input-group">
                                <input id="names" value="{{$supplier->name}}" class="input--style-5" ata-input="true"  name="supplier_name" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">التاريخ</div>
                        <div class="value">
                            <div class="input-group">
                                <input id="names" value="{{$purchase->bill_date}}" class="input--style-5" ata-input="true" type="date"  name="bill_date" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">رقم الفاتوره</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5"  type="bill_numb" name="bill_numb" value="{{$counter}}" readonly>
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

                        </tr>
                        </thead>
                        <tbody id="records">

                        @foreach ($bills as $bill)

                        <tr>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="code" id="code" value="{{$bill->item->id}}" name="code" readonly>
                                    </div>
                                </div></td>


                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" value="{{$bill->item->name}}"  name="item_name" readonly>
                                        </div>
                                    </div>
                               </td>

                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" id="quantity" value="{{$bill->quantity}}" type="quantity" name="quantity" readonly>
                                    </div>
                                </div></td>

                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="price" id="purchase_price" value="{{$bill->price}}" name="purchase_price" readonly>
                                    </div>
                                </div></td>

                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" id="total" type="total" name="total" value="{{ $bill->price * $bill->quantity}}" readonly>
                                    </div>
                                </div></td>




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
                                        <input class="input--style-5" value="{{$purchase->total}}" type="total_bill" name="total_bill" readonly>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" value="{{$cash->credit}}" type="cash" name="cash" readonly>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="credit" value="{{$credit->credit}}" name="credit" readonly>
                                    </div>
                                </div></td>
                        </tr>

                        </tbody>
                    </table>
                </form>
                <div class="text-center mb-5">
                    <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/purchases/{{$purchase->id}}/edit';">عدل </button>
                </div>
            </div>
        </div>
    </div>

@endsection







