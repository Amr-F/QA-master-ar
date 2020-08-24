@extends('layouts.sidebar')
@extends('layouts.app')

@section('content')




</div>
<div class="wrapper-pur wrapper--w960">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">عرض السجل النقدي</h2>

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
                @foreach($cash as $cash)
                    <tr>
                        <td><a href="/cash/{{$cash->id}}" >{{ $cash->id }}</a></td>
                        <td>{{$cash -> reason}}  </td>
                        <td>{{$cash -> updated_at}}  </td>
                        <td>{{$cash -> debit }}  </td>
                        <td>{{$cash -> credit}}  </td>


                    </tr>

                @endforeach

                </tbody>
            </table>



        </div>
    </div>
</div>
</div>
@endsection
