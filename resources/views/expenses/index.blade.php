@extends('layouts.sidebar')
@extends('layouts.app')


@section('content')




</div>
<div class="wrapper wrapper--w550">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">عرض جميع المصارف</h2>

        </div>
        <div class="card-body">


            <table class="table">
                <thead>
                <tr>
                    <th>اسم المصروف</th>
                    <th>التاريخ</th>
                    <th>المبلغ</th>

                </tr>
                </thead>
                <tbody>
                @foreach($expense as $expense)
                    <tr>
                        <td><a href="/expenses/{{$expense->id}}" >{{ $expense->expcategory->exp_name }}</a></td>

                        <td>{{$expense -> date}}  </td>
                        <td>{{$expense -> amount }}  </td>



                    </tr>

                @endforeach

                </tbody>
            </table>



        </div>
    </div>
</div>
</div>
@endsection
