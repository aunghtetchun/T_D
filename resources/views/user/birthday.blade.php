@extends('dashboard.author')
@section("title") Dashboard @endsection

@section('content')
<style>

</style>
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex flex-column justify-content-between" style="height:85vh">
                    <div class="text-center mtxt mt-3" >
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo mr-1">
                            <h6 class="mvip">Myanmar VIP</h6>
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo ml-1">
                        </div>
                        <h4 class="my-2 mdo"> {{ \Carbon\Carbon::now()->startOfWeek()->format('M d, Y') }} </h4>
                        <h4 class="my-2 mdo fw900"> မှ </h4>
                        <h4 class="my-2 mdo"> {{ \Carbon\Carbon::now()->endOfWeek()->subDays(2)->format('M d, Y') }} ထိ</h4>
                    </div>

                    <div class="card shadow-lg  mx-0">
                       <div class="card-body pb-1 text-center">
                       <div class="d-flex justify-content-center">
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo2 mr-1">
                            <h6 class="mvip " style="font-size:1.6rem"> Myanmar VIP</h6>
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo2 ml-1">
                        </div>
                       
                       <h4 class="my-3 tbm fw900"> {{$daily_num ? $daily_num->label_one :''}} </h4>
                       <h4 class="my-3 tbm fw900"> {{$daily_num ? $daily_num->label_two :''}} </h4>

                       <h4 class=" mt-4 tbr"> 
                       {{$daily_num ? $daily_num->label_three :''}}
                       </h4>
                       <h3  class="text-right fw900">တင်ကစားပါ</h3>
                       </div>
                       
                    </div>
            <div></div>
            <div></div>
            <div></div>
            
        </div>
    </div>

@endsection

