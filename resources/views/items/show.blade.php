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
                <h2 class="title">عرض صنف</h2>

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

                        <tr>
                            <td>{{$item -> id }}</td>
                            <td>{{$item -> name}}  </td>
                            <td>{{$item -> sale_price}}  </td>
                            <td>{{$item -> purchase_price}}  </td>
                            <td>{{$item -> quantity}}  </td>
                            <td>{{($item -> quantity)*($item -> purchase_price)}}  </td>
                        </tr>


                    </tbody>
                </table>

                <div class="text-center mb-5">
                    <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/items/{{$item->id}}/edit';">تعديل</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
