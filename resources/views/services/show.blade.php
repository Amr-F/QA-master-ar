@extends('layouts.sidebar')
@extends('layouts.app')


@section('content')




</div>
<div class="wrapper wrapper--w550">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">عرض خدمه</h2>

        </div>
        <div class="card-body">


            <table class="table">
                <thead>
                <tr>
                    <th>اسم العميل</th>
                    <th>اسم الخدمه</th>
                    <th>التاريخ</th>
                    <th>السعر</th>
                    <th>التكلفه</th>

                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{ $service->customer->name }}</td>
                        <td>{{$service -> name}}  </td>
                        <td>{{$service -> date}}  </td>
                        <td>{{$service -> service_price }}  </td>
                        <td>{{$service -> service_cost}}  </td>


                    </tr>



                </tbody>
            </table>
            <div class="text-center mb-5">
                <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/services/{{$service->id}}/edit';">تعديل </button>
            </div>


        </div>
    </div>
</div>
</div>
@endsection
