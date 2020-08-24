@extends('layouts.sidebar')
@extends('layouts.app')


@section('content')




</div>
<div class="wrapper-pur wrapper--w960">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">عرض جميع الخدمات</h2>

        </div>
        <div class="card-body">


            <table class="table">
                <thead>
                <tr>
                    <th>اسم العميل</th>
		    <th>رقم الهاتف</th>
                    <th>اسم الخدمه</th>
                    <th>التاريخ</th>
                    <th>السعر</th>
                    

                </tr>
                </thead>
                <tbody>
                @foreach($service as $service)
                    <tr>
                        <td><a href="/services/{{$service->id}}" >{{ $service->customer->name }}</a></td>
			<td>{{$service -> customer->phone}}  </td>
                        <td>{{$service -> name}}  </td>
                        <td>{{$service -> date}}  </td>
                        <td>{{$service -> service_price }}  </td>
                        


                    </tr>

                @endforeach

                </tbody>
            </table>



        </div>
    </div>
</div>
</div>
@endsection
