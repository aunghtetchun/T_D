
@extends('dashboard.wedding-ui')

@section("title") Sample Page @endsection

@section('content')
        <div class="col-12 p-0">
            <div class="overlay h-100" >
                <div class="mx-auto col-12 col-md-6 col-lg-6 d-flex flex-wrap h-100 align-items-center">
                        <h1 class="col-12 display-4 text-center mb-4">TZT</h1>
                        <h4 class="col-12 text-center mb-5">Your Golf Journey Awaits</h1>
                </div>
            </div>
            <div class="w-100" style="height: 75vh; background-image: url('{{asset('wedding/images/golf.jpg')}}'); background-size: cover; background-position: bottom">

            </div>
        </div>
        
@endsection




