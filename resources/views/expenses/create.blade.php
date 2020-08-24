@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')
    <div class="text-right mb-5">
        <button type="button"  onclick="window.location.href='/expenses/index';"
                class="btn btn-success">عرض كل المصاريف</button>


    </div>


    <div class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">دفع مضروف</h2>

            </div>
            <div class="card-body">

                <form method="POST" action="/expenses">
                    @csrf
                    <div class="form-row">
                        <div class="name">السم المصروف</div>
                        <div class="value">
                            <div class="input-group">


                                <select class="input--style-5" name="expense_id" required>
                                    <option disabled="disabled" selected="selected">اختر المصروف</option>


                                    @foreach($expcategory->all() as $expcategory)
                                        <option value="{{$expcategory->id}}">{{$expcategory->exp_name}}</option>
                                    @endforeach

                                </select>
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
                        <div class="name">المبلغ</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="number" name="amount" required>

                            </div>
                        </div>
                    </div>





                    <div>
                        <div class="text-center mb-5">
                            <button class="btn btn--radius-2 btn--green" type="submit">اضف</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

