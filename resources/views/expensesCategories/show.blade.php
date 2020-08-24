@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


    <div class="wrapper wrapper--w550">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عرض نوع مصروف</h2>

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

                        <tr>

                            <td>{{$expcategory->id}}  </td>
                            <td>{{$expcategory->exp_name}}  </td>

                        </tr>



                    </tbody>
                </table>

                <div class="text-center mb-5">
                    <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/expensesCategories/{{$expcategory->id}}/edit';">عدل</button>
                </div>

            </div>
        </div>
    </div>
@endsection
