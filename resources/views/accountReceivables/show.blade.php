@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


    <div class="text-right mb-5">
        <button type="button"  onclick="window.location.href='/accountReceivables/create';"
                class="btn btn-success">+ حصل من عميل</button>

    </div>
    <div class="wrapper wrapper--w550">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عرض حساب " @foreach($customer as $customer)
                        {{$customer->name}}
                    @endforeach
                    "  </h2>

            </div>
            <div class="card-body">


                <table class="table">
                    <thead>
                    <tr>
                        <th>رقم السجل</th>
                        <th>التاريخ</th>
                        <th>دائن</th>
                        <th>مدين</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accountReceivable as $accountReceivable)
                        <tr>
                            <td> <a href='/accountReceivables/{{$accountReceivable->id}}/edit' > {{$accountReceivable ->id }}</a></td>
                            <td>{{$accountReceivable->payment_date}}  </td>
                            <td>{{$accountReceivable -> debit}}  </td>
                            <td>{{$accountReceivable ->credit}}  </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="text-center mb-5"> <h1> الجمالي = {{$total}}
                    </h1>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
