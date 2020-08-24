@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')




</div>
<div class="wrapper wrapper--w550">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">تقرير سريع</h2>

        </div>
        <div class="card-body">


            <div class="form-row">
                <div class="name">النقض</div>
                <div class="value">
                    <div class="input-group">
                        <input class="input--style-5" value="{{$cash}}" type="name" name="cash" readonly>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="name">المخذون</div>
                <div class="value">
                    <div class="input-group">
                        <input class="input--style-5" value="{{$invetory}}" type="name" name="inventory" readonly>

                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="name">حسابات الموردين</div>
                <div class="value">
                    <div class="input-group">
                        <input class="input--style-5" value="{{$ap}}" type="name" name="ap" readonly>

                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="name">حسابات العملاء</div>
                <div class="value">
                    <div class="input-group">
                        <input class="input--style-5" value="{{$ar}}" type="name" name="ar" readonly>

                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="name"> ارباع من المبيعات </div>
                <div class="value">
                    <div class="input-group">
                        <input class="input--style-5" type="name" value="{{$income_from_sale}}" name="income" readonly>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="name">ارباح من الخدمات</div>
                <div class="value">
                    <div class="input-group">
                        <input class="input--style-5" type="name" value="{{$income_from_service}}" name="income" readonly>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="name">ارباح قبل المصاريف</div>
                <div class="value">
                    <div class="input-group">
                        <input class="input--style-5" type="name" value="{{$income_before}}" name="income" readonly>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="name">ارباح بعد المصاريف </div>
                <div class="value">
                    <div class="input-group">
                        <input class="input--style-5" type="name" value="{{$income_after}}" name="income" readonly>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
