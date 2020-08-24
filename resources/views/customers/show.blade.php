@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


    <div class="text-right mb-5">
        <button type="button"  onclick="window.location.href='/customers/create';"
                class="btn btn-success">+ اضف عميل جديد</button>

    </div>
    <div class="wrapper wrapper--w550">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عرض عميل</h2>

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

                    <tr>
                        <td>{{$customer -> name}}</td>
                        <td>{{$customer -> phone}}</td>
                    </tr>

                    </tbody>
                </table>
                <div class="text-center mb-5">
                    <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/customers/{{$customer->id}}/edit';">عدل</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
