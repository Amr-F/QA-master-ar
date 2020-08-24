@extends('layouts.sidebar')
@extends('layouts.app')


@section('content')




    </div>
    <div class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عرض كل فواتير مشتريات</h2>


            </div>
            <div class="card-body">


                <table class="table">
                    <thead>
                    <tr>
                        <th>رقم الفاتوره</th>
                        <th>التاريخ</th>
                        <th>اسم المورد</th>
                        <th>الاجمالي</th>


                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($purchases as $purchase)
                        <tr>
                            <td> <a href='/purchases/{{$purchase->id}}' >{{$counter += 1}}</td>
                            <td>{{$purchase->bill_date}}</td>
                            <td>{{$purchase->supplier->name}}</td>
                            <td>{{$purchase->total}}</td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>



            </div>
        </div>
    </div>
    </div>


@endsection
