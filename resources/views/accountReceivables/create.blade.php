@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


    <div class="wrapper wrapper--w550">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">التحصيل من عميل</h2>

            </div>
            <div class="card-body">

                <form method="POST" action="/accountReceivables">
                    @csrf
                    <div class="form-row">
                        <div class="name">اسم العميل</div>
                        <div class="value">
                            <div class="input-group">


                                <select class="input--style-5" name="customer_name" required>
                                    <option disabled="disabled" selected="selected"  >اختر العميل</option>


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
                                <input  class="input--style-5" ata-input="true" type="date" name="payment_date" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">المبلغ</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5"  name="amount" required  >
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="text-center mb-5">
                            <button class="btn btn--radius-2 btn--red" type="submit">حصل</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

