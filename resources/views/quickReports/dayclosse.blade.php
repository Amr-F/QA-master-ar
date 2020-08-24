@extends('layouts.sidebar')
@extends('layouts.app')
@section('content')


    <div class="wrapper-pur wrapper--w960">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">انهاء اليوم</h2>

            </div>
            <div class="card-body">

                <form method="POST" action="/quickReports/dayclosse">
                    @csrf



                    <div class="form-row">
                        <div class="name">النقض</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5"  name="amount" value="{{$total}}" required>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="text-center mb-5">
                            <button class="btn btn--radius-2 btn--green" type="submit">انهاء</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


