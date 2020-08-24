@extends('layouts.sidebar')
@extends('layouts.app')
</link>
<script src="/js/jquery.min.js"></script>
<script src="/js/jqueryui.js"></script>
<script src="/js/ajaxCalls.js"></script>
<script src="/js/saleAjaxCalls.js"></script>
<script>
    $(function()
    {
        $( "#item_name" ).autocomplete({
            source: "search/autocomplete",
            minLength: 3,
            select: function(event, ui) {
                $('#item_name').val(ui.item.value);
            }
        });
    });
</script>


<input id="tags">


@section('content')
    <div class="text-right mb-5">
        <button type="button"  onclick="window.location.href='/sales/index';"
                class="btn btn-success">عرض جميع فواتير المبيعات</button>


    </div>

    <div id="app" class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عمل فاتورة مبيعات</h2>

            </div>
            <div   class="card-body">
                <form  method="POST" action="/sales">



                    @csrf
                    <div  class="form-row">
                        <div class="name">اسم العميل</div>
                        <div class="value">
                            <div class="input-group">


                                <select class="input--style-5" name="customer_name" required>
                                    <option disabled="disabled" selected="selected">اختر العميل</option>


                                    @foreach($customer->all() as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">التاريخ</div>
                        <div class="value">
                            <div class="input-group">
                                <input id="names" class="input--style-5" ata-input="true" type="date" name="invoice_date" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">رقم الفاتوره</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="invoice_numb" readonly>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>الكود</th>
                            <th>الصنـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــف</th>
                            <th>الكميـــه</th>
                            <th>السعــــــــر</th>
                            <th>الاجمالــــــي</th>
                            <th>المخزن</th>
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


{{--                            <td><div class="form-row">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <select class="input--style-5" name="item_name" required>--}}
{{--                                            <option disabled="disabled" selected="selected">اختر صنف</option>--}}


{{--                                            @foreach($item->all() as $item)--}}
{{--                                                <option value="{{$item->id}}">{{$item->name}}</option>--}}
{{--                                            @endforeach--}}

{{--                                        </select>--}}
{{--                                        <div id="list">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div></td>--}}
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5"id="item_name" type="text" name="item_name" required>
                                    </div>
                                </div></td>

                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" id="quantity" type="quantity" name="quantity" required>
                                    </div>
                                </div></td>

                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="price" id="sale_price" name="sale_price" required>
                                    </div>
                                </div></td>

                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" id="total" type="total" name="total" required>
                                    </div>
                                </div></td>
                            <td> <input type="text" value="0" id="quantity_in_inventory" name="quantity_in_inventory"></td>
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
                                        <input class="input--style-5" type="total_invoice" name="total_invoice" required>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" value="0" type="cash" name="cash" required>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="credit" value="0" name="credit" required readonly>
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







