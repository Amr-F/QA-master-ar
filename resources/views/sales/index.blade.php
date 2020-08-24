@extends('layouts.sidebar')
@extends('layouts.app')


@section('content')




</div>
<div class="wrapper-pur wrapper--w960">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">جميع فواتير المبيعات</h2>

        </div>
        <div class="card-body">


            <table class="table">
                <thead>
                <tr>
                    <th>رقم الفاتوره</th>
                    <th>التريخ</th>
                    <th>اسم العميل</th>
                    <th>الاجمالي</th>


                </tr>
                </thead>
                <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td> <a href='/sales/{{$sale->id}}' >{{$counter += 1}}</td>
                        <td>{{$sale->created_at}}</td>
                        <td>{{$sale->customer->name}}</td>
                        <td>{{$sale->total}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>



        </div>
    </div>
</div>
</div>
@endsection
