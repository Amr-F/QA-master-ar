@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


    <div class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">عمل نوع مصروف</h2>

            </div>
            <div class="card-body">

                <form method="POST" action="/expensesCategories">
                    @csrf

                    <div class="form-row">
                        <div class="name">الاسم</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="name" name="exp_name" required>

                            </div>
                        </div>
                    </div>




                    <div>
                        <div class="text-center mb-5">
                            <button class="btn btn--radius-2 btn--green" type="submit">اضف</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

