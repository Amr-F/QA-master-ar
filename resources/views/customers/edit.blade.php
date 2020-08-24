@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


    <div class="wrapper wrapper--w550">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">تعديل العميل</h2>

            </div>
            <div class="card-body">


                <form method="POST" action="/customers/{{$customer ->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="name">الاسم</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="name" name="name" value="{{$customer -> name}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row" >
                        <div class="name">رقم الهاتف</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="phone" name="phone" value="{{$customer -> phone}}">
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="text-center mb-5">
                            <button class="btn btn--radius-2 btn--green" type="submit">عدل العميل</button>
                        </div>
                    </div>
                </form>

                <form method="POST" action="/customers/{{$customer->id}}/destroy">
                    @csrf
                    <div class="text-center mb-5">
                        <button class="btn btn--radius-2 btn--red" type="submit">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

