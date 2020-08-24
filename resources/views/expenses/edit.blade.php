@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')
<div class="wrapper-pur wrapper--w960">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">تعديل المصروف</h2>

        </div>
        <div class="card-body">

            <form method="post" action="/expenses/{{$expense ->id}}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="name">اسم المصروف</div>
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
                            <input class="input--style-5" type="date" name="date" value="{{$expense->date}}" required>

                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">المبلغ</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="input--style-5" type="number" name="amount"value="{{$expense->amount}}" required>

                        </div>
                    </div>
                </div>





                <div>
                    <div class="text-center mb-5">
                        <button class="btn btn--radius-2 btn--green" type="submit">عدل</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="/expenses/{{$expense->id}}/destroy">
                @csrf
                <div class="text-center mb-5">
                    <button class="btn btn--radius-2 btn--red" type="submit">احذف</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

