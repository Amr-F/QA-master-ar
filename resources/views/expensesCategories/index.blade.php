@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')
    <div class="text-right mb-5">
        <button type="button"  onclick="window.location.href='/expensesCategories/create';"
                class="btn btn-success">+ عمل نوع مصروف</button>

    </div>

<div class="wrapper wrapper--w550">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">عرض كل انواع المصاريف</h2>

        </div>
        <div class="card-body">


            <table class="table">
                <thead>
                <tr>
                    <th>رقم السجل</th>
                    <th>اسم المصروف</th>



                </tr>
                </thead>
                <tbody>
                @foreach($expCategory as $expCategory)
                    <tr>

                        <td><a href="/expensesCategories/{{$expCategory->id}}" >{{$expCategory->id}} </a> </td>
                        <td>{{$expCategory->exp_name}}  </td>

                    </tr>

                @endforeach

                </tbody>
            </table>



        </div>
    </div>
</div>
@endsection
