@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')



    <div class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">تعديل نوع مصروف</h2>

            </div>
            <div class="card-body">

                <form method="POST" action="/expensesCategories/{{$expcategory ->id}}">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="name">الاسم</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="name" name="exp_name" value="{{$expcategory -> exp_name}}" required>

                            </div>
                        </div>
                    </div>




                    <div>
                        <div class="text-center mb-5">
                            <button class="btn btn--radius-2 btn--green" type="submit">تعديل</button>
                        </div>
                    </div>

                </form>
                <form method="POST" action="/expensesCategories/{{$expcategory->id}}/destroy">
                    @csrf
                    <div class="text-center mb-5">
                        <button class="btn btn--radius-2 btn--red" type="submit">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

