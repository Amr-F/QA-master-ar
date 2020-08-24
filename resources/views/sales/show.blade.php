@extends('layouts.sidebar')
@extends('layouts.app')
<script src="/js/jquery.min.js"></script>

@section('content')


    <div id="app" class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عرض فاتوره مبيعات</h2>

            </div>
            <div   class="card-body">
                <form  method="POST" action="/sales">



                    @csrf
                    <div  class="form-row">
                        <div class="name">اسم العميل</div>
                        <div class="value">
                            <div class="input-group">
                                <input id="names" value="{{$customer->name}}" class="input--style-5" ata-input="true"  name="customer_name" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">التاريخ</div>
                        <div class="value">
                            <div class="input-group">
                                <input id="names" value="{{$sale->invoice_date}}" class="input--style-5" ata-input="true" type="date"  name="invoice_date" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">رقم الفاتوره</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5"  type="invoice_numb" name="invoice_numb" value="{{$counter}}" readonly>
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

                        </tr>
                        </thead>
                        <tbody id="records">

                        @foreach ($invoices as $invoice)

                            <tr>
                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" type="code" id="code" value="{{$invoice->item->id}}" name="code" readonly>
                                        </div>
                                    </div></td>


                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" value="{{$invoice->item->name}}"  name="item_name" readonly>
                                        </div>
                                    </div>
                                </td>

                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" id="quantity" value="{{$invoice->quantity}}" type="quantity" name="quantity" readonly>
                                        </div>
                                    </div></td>

                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" type="price" id="purchase_price" value="{{$invoice->price}}" name="purchase_price" readonly>
                                        </div>
                                    </div></td>

                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" id="total" type="total" name="total" value="{{ $invoice->price * $invoice->quantity}}" readonly>
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
                                        <input class="input--style-5" value="{{$sale->total}}" type="total_bill" name="total_invoice" readonly>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" value="{{$cash->debit}}" type="cash" name="cash" readonly>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="credit" value="{{$credit->debit}}" name="credit" readonly>
                                    </div>
                                </div></td>
                        </tr>

                        </tbody>
                    </table>
                </form>
                <div class="text-center mb-5">
                    <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/sales/{{$sale->id}}/edit';">تعديل </button>
                </div>
            </div>
        </div>
    </div>

@endsection







