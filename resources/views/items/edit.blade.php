@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


    <div class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">تعديل صنف</h2>

            </div>
            <div class="card-body">


                <form method="POST" action="/items/{{$item->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="name">الاسم</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="name" name="name" value="{{$item -> name}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row" >
                        <div class="name">سعر البيع</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="sale_price" name="sale_price" value="{{$item -> sale_price}}">
                                @error('sale_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row" >
                        <div class="name">سعر الشراء</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="purchase_price" name="purchase_price" value="{{$item -> purchase_price}}">
                                @error('purchase_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row" >
                        <div class="name">الكميه</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="quantity" name="quantity" value="{{$item -> quantity}}">
                                @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="text-center mb-5">
                            <button class="btn btn--radius-2 btn--green" type="submit">تعديل</button>
                        </div>
                    </div>
                </form>
                <form method="POST" action="/items/{{$item->id}}/destroy">
                    @csrf
                    <div class="text-center mb-5">
                        <button class="btn btn--radius-2 btn--red" type="submit">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

