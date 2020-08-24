@extends('layouts.sidebar')
@extends('layouts.app')


@section('content')


    <div class="text-right mb-5">
        <button type="button"  onclick="window.location.href='/accountPayables/create';"
                class="btn btn-success">+ ادفع لمورد </button>

    </div>
    <div class="wrapper wrapper--w550">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عرض جميع حسابات الموردين</h2>

            </div>
            <div class="card-body">


                <table class="table">
                    <thead>
                    <tr>

                        <th>اسم المورد</th>
                        <th>الكم</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accountPaybales as $accountPaybales)
                        <tr>
                            <td><a href="/accountPayables/{{$accountPaybales['id']}}" >{{$accountPaybales['name']}} </a> </td>
                            <td>{{$accountPaybales['credit']}}  </td>


                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <div class="text-center mb-5"> <h1> الجمالي = {{$totalap}}
                    </h1>
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
