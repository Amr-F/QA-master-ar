@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


    <div class="wrapper wrapper--w550">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">تعديل حساب العميل</h2>

            </div>
            <div class="card-body">

                @foreach($accountReceivables as $accountReceivables)
                @endforeach
                <form method="POST" action="/accountReceivables/{{$accountReceivables ->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="name">التاريخ</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" name="payment_date" value="{{$accountReceivables -> payment_date}}" required>

                            </div>
                        </div>
                    </div>
                    <div class="form-row" >
                        <div class="name">دائن</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5"  name="debit" value="{{$accountReceivables -> debit}}" required>

                            </div>
                        </div>
                    </div>
                    <div class="form-row" >
                        <div class="name">مدين</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5"  name="credit" value="{{$accountReceivables -> credit}}" required>

                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="text-center mb-5">
                            <button class="btn btn--radius-2 btn--green" type="submit">عدل الحساب</button>
                        </div>
                    </div>
                </form>

                <form method="POST" action="/accountReceivables/{{$accountReceivables->id}}/destroy">
                    @csrf
                    <div class="text-center mb-5">
                        <button class="btn btn--radius-2 btn--red" type="submit">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

