@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')

    <div class="wrapper wrapper--w550">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">اختر طريقه عرض الاصناف</h2>

            </div>
            <div class="card-body">



                <div class="text-center mb-5">
                    <button type="button"  onclick="window.location.href='/items/index/1';"
                            class="btn btn-success">رتب حسب الاسم</button>

                </div>

                <div class="text-center mb-5">
                    <button type="button"  onclick="window.location.href='/items/index/2';"
                            class="btn btn-success">رتب حسب الكود</button>

                </div>

                <div class="text-center mb-5">
                    <button type="button"  onclick="window.location.href='/items/index/3';"
                            class="btn btn-success">رتب حسب الكميه</button>

                </div>



            </div>
        </div>
    </div>
    </div>

@endsection
