@extends('layouts.sidebar')
@extends('layouts.app')


@section('content')




</div>
<div class="wrapper wrapper--w550">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">عرض مصروف</h2>

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

                    <tr>
                        <td>{{ $expense->expcategory->exp_name }}</td>

                        <td>{{$expense -> date}}  </td>
                        <td>{{$expense -> amount }}  </td>



                    </tr>



                </tbody>
            </table>

            <div class="text-center mb-5">
                <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/expenses/{{$expense->id}}/edit';">عدل </button>
            </div>


        </div>
    </div>
</div>
</div>
@endsection
