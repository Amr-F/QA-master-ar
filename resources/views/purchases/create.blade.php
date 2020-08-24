@extends('layouts.sidebar')
@extends('layouts.app')
<script src="/js/jquery.min.js"></script>
<script src="/js/ajaxCalls.js"></script>
<script src="/js/purchaseAjaxCalls.js"></script>
<link rel="stylesheet" type="text/css" href="/vendor/font-awesome-4.7/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/vendor/mdi-font/css/material-design-iconic-font.css">
@section('content')
    <div class="text-right mb-5">
        <button type="button"  onclick="window.location.href='/purchases/index';"
                class="btn btn-success">عرض جميع فواتير المشتريات</button>


    </div>

    <div id="app" class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عمل فاتوره مشتريات</h2>

            </div>
            <div   class="card-body">
                <form  method="POST" action="/purchases">



                    @csrf
                    <div  class="form-row">
                        <div class="name">اسم المورد</div>
                        <div class="value">
                            <div class="input-group">


                                <select class="input--style-5" name="supplier_name" required>
                                    <option disabled="disabled" selected="selected">اختر اسم المورد</option>


                                   @foreach($supplier->all() as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">التاريخ</div>
                        <div class="value">
                            <div class="input-group">
                                <input id="names" class="input--style-5" ata-input="true" type="date" name="bill_date" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">رقم الفاتوره</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="bill_numb" name="bill_numb" readonly>
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
                            <th>الاجملي</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody id="records">

                            <tr>
                                <td><div class="form-row">
                                            <div class="input-group">
                                                <input class="input--style-5" type="code" id="code" name="code" required>
                                            </div>
                                    </div></td>


                                <td><div class="form-row">
                                        <div class="input-group">
                                            <select class="input--style-5" name="item_name" required>
                                                <option disabled="disabled" selected="selected">اختر الصنف</option>


                                                @foreach($item->all() as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach

                                            </select>
                                            <div id="list">
                                            </div>
                                             </div>
                                    </div></td>

                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" id="quantity" type="quantity" name="quantity" required>
                                        </div>
                                    </div></td>

                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" type="price" id="purchase_price" name="purchase_price" required>
                                        </div>
                                    </div></td>

                                <td><div class="form-row">
                                        <div class="input-group">
                                            <input class="input--style-5" id="total" type="total" name="total" required>
                                        </div>
                                    </div></td>


                                <td>        <button type="button" id="deleteRow" class="fa fa-window-close"></button> </td>

                            </tr>

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
                                    <input class="input--style-5" type="total_bill" name="total_bill" required>
                                </div>
                            </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" value="0" type="cash" name="cash" required>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="credit" name="credit" required>
                                    </div>
                                </div></td>
                        </tr>

                        </tbody>
                    </table>
                    <div>
                        <div class="text-center mb-5">
                            <button id="submit" class="btn btn--radius-2 btn--green">اضف الفاتوره</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection







