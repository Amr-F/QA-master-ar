@extends('layouts.sidebar')
@extends('layouts.app')

@section('content')




</div>
<div class="wrapper wrapper--w550">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">عرض صف في السجل النقضي</h2>

        </div>
        <div class="card-body">


            <table class="table">
                <thead>
                <tr>
                    <th>رقم السجل</th>
                    <th>السبب</th>
                    <th>التاريخ</th>
                    <th>دائن</th>
                    <th>مدين</th>

                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$cash->id }}</td>
                        <td>{{$cash -> reason}}  </td>
                        <td>{{$cash -> updated_at}}  </td>
                        <td>{{$cash -> debit }}  </td>
                        <td>{{$cash -> credit}}  </td>


                    </tr>



                </tbody>
            </table>



        </div>
    </div>
</div>
</div>
@endsection
