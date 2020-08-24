@extends('layouts.sidebar')
@extends('layouts.app')
@extends('layouts.chart')
@section('content')
<div class="container">
    <div class="text-center mb-5">
        <div class="row justify-content-center">
             <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                         @if (session('status'))
                             <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                             </div>
                           @endif
                            You are logged in {{Auth::user()-> name }}
                     </div>

                 </div>

            </div>
         </div>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div id="curve_chart" style="width: 700px; height: 400px"></div>
                    </div>
                </div>
             </div>
        </div>

    </div>
</div>

@endsection


