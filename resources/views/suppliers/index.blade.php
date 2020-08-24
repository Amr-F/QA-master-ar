@extends('layouts.sidebar')
@extends('layouts.app')


@section('content')


    <div class="text-right mb-5">
    <button type="button"  onclick="window.location.href='/suppliers/create';"
            class="btn btn-success">اضف مورد جديد</button>

    </div>
    <div class="wrapper wrapper--w550">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عرض جميع الموردين</h2>

            </div>
            <div class="card-body">


                <table class="table">
                    <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($supplier as $supplier)
                        <tr>
                            <td><a href="/suppliers/{{$supplier->id}}" >{{ $supplier -> name}}</a></td>
                            <td>{{$supplier -> phone}}  </td>


                        </tr>

                    @endforeach
                    </tbody>
                </table>



        </div>
    </div>
</div>
    </div>
@endsection
