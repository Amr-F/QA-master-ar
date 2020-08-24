@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


    <div class="text-right mb-5">
        <button type="button"  onclick="window.location.href='/items/create';"
                class="btn btn-success">+ اضف صنف</button>

    </div>
    <div class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عرض المخزون</h2>

            </div>
            <div class="card-body">


                <table class="table">
                    <thead>
                    <tr>
                        <th>الكود</th>
                        <th>الاسم</th>
                        <th>سعر البيع</th>
                        <th>سعر الشراء</th>
                        <th>الكميه</th>
                        <th>الاجمالي</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($item as $item)
                        <tr>
                            <td><a href="/items/{{$item->id}}" >{{ $item -> id}}</a></td>
                            <td>{{$item -> name}}  </td>
                            <td>{{$item -> sale_price}}  </td>
                            <td>{{$item -> purchase_price}}  </td>
                            <td>{{$item -> quantity}}  </td>
                            <td>{{($item -> quantity)*($item -> purchase_price)}}  </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </div>
    </div>
@endsection
