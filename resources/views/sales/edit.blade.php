@extends('layouts.sidebar')
@extends('layouts.app')
<script src="/js/jquery.min.js"></script>
<script src="/js/ajaxCalls.js"></script>
<script src="/js/editSaleAjaxCalls.js"></script>

@section('content')


    <div id="app" class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">تعديل فاتوره مبيعات</h2>

            </div>
            <div   class="card-body">
                <form  method="POST" action="/sales">



                    @csrf
                    <div  class="form-row">
                        <div class="name">اسم العميل</div>
                        <div class="value">
                            <div class="input-group">


                                <select class="input--style-5" name="supplier_name" required>
                                    <option disabled="disabled">اختر العميل</option>

                                    @foreach($customers as $cus)
                                        <option value="{{$customer->id}}" @if ($cus->id == $customer->id)selected="selected"@endif>{{$customer->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">التاريخ</div>
                        <div class="value">
                            <div class="input-group">
                                <input id="names" value="{{$sale->invoice_date}}" class="input--style-5" ata-input="true" type="date"  name="invoice_date" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">رقم الفاتوره</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5"  type="invoice_numb" name="invoice_numb" value="{{$counter}}"readonly>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>الكود</th>
                            <th>الصنف</th>
                            <th>الكميه</th>
                            <th>السعر</th>
                            <th>الاجمالي</th>
                            <th>حذف</th>

                        </tr>
                        </thead>
                        <tbody id="records">

                        @foreach ($invoices as $invoice)

                            <tr>
                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" type="code" id="code" value="{{$invoice->item->id}}" name="code" required>
                                        </div>
                                    </div></td>


                                <td><div class="form-row">
                                        <div class="input-group">
                                            <select class="input--style-5" name="item_name" required>
                                                <option name="select" disabled="disabled">اختر صنف</option>

                                                @foreach($items as $item)
                                                    <option value="{{$item->id}}" @if ($item->id == $invoice->item->id) selected="selected" @endif>{{$item->name}}</option>
                                                @endforeach

                                            </select>
                                            <div id="list">
                                            </div>
                                        </div>
                                    </div></td>

                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" id="quantity" value="{{$invoice->quantity}}" type="quantity" name="quantity" required>
                                        </div>
                                    </div></td>

                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" type="price" id="sale_price" value="{{$invoice->price}}" name="sale_price" required>
                                        </div>
                                    </div></td>

                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" id="total" type="total" name="total" value="{{ $invoice->price * $invoice->quantity}}" required>
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
                                        <input class="input--style-5" value="{{$sale->total}}" type="total_invoice" name="total_invoice" required>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" value="{{$cash->debit}}" type="cash" name="cash" required>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="credit" value="{{$credit->debit}}" name="credit" required>
                                    </div>
                                </div></td>
                        </tr>

                        </tbody>
                    </table>
                    <div>
                        <div class="text-center mb-5">
                            <button id="submit" class="btn btn--radius-2 btn--green">عددل</button>
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







