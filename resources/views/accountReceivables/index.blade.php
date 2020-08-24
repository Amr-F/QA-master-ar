@extends('layouts.sidebar')
@extends('layouts.app')


@section('content')


    <div class="text-right mb-5">
        <button type="button"  onclick="window.location.href='/accountReceivables/create';"
                class="btn btn-success">+ حصل من عميل</button>

    </div>
    <div class="wrapper wrapper--w550">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عرض جميع حسابات العملاء</h2>

            </div>
            <div class="card-body">


                <table class="table">
                    <thead>
                    <tr>

                        <th>اسم العميل</th>
                        <th>المبلغ</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accountReceivables as $accountReceivables)
                        <tr>
                            <td><a href="/accountReceivables/{{$accountReceivables['id']}}" >{{$accountReceivables['name']}} </a> </td>
                            <td>{{$accountReceivables['credit']}}  </td>


                        </tr>

                    @endforeach

                    </tbody>
                </table>

                <div class="text-center mb-5"> <h1> الجمالي = {{$totalar}}
                    </h1>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
