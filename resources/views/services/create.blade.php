
@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')
    <div class="text-right mb-5">
        <button type="button"  onclick="window.location.href='/services/index';"
                class="btn btn-success">عرض جميع الخدمات</button>


    </div>


    <div class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عمل خدمه</h2>

            </div>
            <div class="card-body">

                <form method="POST" action="/services">

                    @csrf
                    <div class="form-row">
                        <div class="name">اسم العميل</div>
                        <div class="value">
                            <div class="input-group">


                                <select class="input--style-5" name="customer_id" required>
                                    <option disabled="disabled" selected="selected">اختر العميل</option>


                                    @foreach($customer->all() as $customer)
                                        <option value="{{$customer->id}}" >{{$customer->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">العطـــــــل</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="name" name="name" required>

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">التاريخ </div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="date" name="date" required>

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">سعر الخدمه</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="number" id="service_price" name="service_price" required>

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">تكلفه الخدمه </div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" value="0" type="number" name="service_cost" required>

                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>

                            <th>النقدي</th>
                            <th>علي الحساب</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>

                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" value="0" type="cash" id="cash" name="cash" required>
                                    </div>
                                </div></td>
                            <td><div class="form-row">
                                    <div class="input-group">
                                        <input class="input--style-5" type="credit" value="0" id="credit" name="credit" required readonly>
                                    </div>
                                </div></td>
                        </tr>

                        </tbody>
                    </table>



                    <div>
                        <div class="text-center mb-5">
                            <button class="btn btn--radius-2 btn--green" type="submit">اضف الخدمه</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="/js/jquery.min.js"></script>
        <script  >
            $(document).ready(function(){
                $("#service_price").keyup(function(){
                    $("#cash").val($("#service_price").val());
                });
            });
            $(document).ready(function(){
                $("#cash").keyup(function(){
                    $("#credit").val(($("#service_price").val())-($("#cash").val()));
                });
            });
        </script>




@endsection

