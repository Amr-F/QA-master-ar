@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


        <div class="wrapper wrapper--w550">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">الدفع لمورد</h2>

                </div>
                <div class="card-body">

                    <form method="POST" action="/accountPayables">
                        @csrf
                        <div class="form-row">
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
                                    <input  class="input--style-5" ata-input="true" type="date" name="payment_date" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">الكم</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5"  name="amount" required >
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="text-center mb-5">
                            <button class="btn btn--radius-2 btn--red" type="submit">اضف</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

