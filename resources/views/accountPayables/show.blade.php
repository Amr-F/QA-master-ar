@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


    <div class="text-right mb-5">
        <button type="button"  onclick="window.location.href='/accountPayables/create';"
                class="btn btn-success">+ ادفع لمورد</button>

    </div>
    <div class="wrapper wrapper--w550">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عرض حساب " @foreach($supplier as $supplier)
                        {{$supplier->name}}
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
                    @foreach($accountPaybale as $accountPaybale)
                    <tr>
                        <td> <a href='/accountPayables/{{$accountPaybale->id}}/edit' > {{$accountPaybale ->id }}</a></td>
                        <td>{{$accountPaybale->payment_date}}  </td>
                        <td>{{$accountPaybale -> debit}}  </td>
                        <td>{{$accountPaybale ->credit}}  </td>

                    </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="text-center mb-5"> <h1> الاجمالي = {{$total}}
                    </h1>
                    </div>

            </div>
        </div>
    </div>
    </div>
@endsection
