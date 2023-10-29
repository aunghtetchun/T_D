@extends('dashboard.author')
@section("title") Dashboard @endsection

@section('content')
<style>
   
</style>
    <div class="row justify-content-center">                                                           
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-start pt-2 px-0" style="height:85vh">
                  
                    <div class="text-center mtxt mt-3" >
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo mr-1">
                            <h6 class="mvip">Myanmar VIP</h6>
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo ml-1">
                        </div>
                       
                        <h4 class="mco"> နေ့တိုက်ပတ်သီး</h4>
                        <h4 class="my-2"> {{ \Carbon\Carbon::now()->format('M d, Y') }} </h4>
                        <h5>12:00 & 4:30 PM</h5>
                        <h5 class="fw900 mt-4">ဆရာ့အကြိုက်ပတ်သီး - {{ $daily_num ? $daily_num->label_one : ''}}</h5>
                    </div>
                    <div class="card shadow-lg  mx-3 mt-4">
                       <div class="card-body pb-1 text-center">
                       <div class="d-flex justify-content-center">
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo2 mr-1">
                            <h6 class="mvip " style="font-size:1.6rem"> Myanmar VIP</h6>
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo2 ml-1">
                        </div>
                       <div class="d-flex justify-content-around my-3">
                            <h1 class="pl-1">
                                    {{$daily_num ? $daily_num->label_one : ''}}
                                </h1>
                                <h3 class="vs mb-4">VS</h3>
                                <h1 class="pr-1">
                                    {{$daily_num ? $daily_num->label_two : ''}}
                                </h1>
                       </div>
                       <h4 class="fw900"> 
                       {{$daily_num ? $daily_num->label_three : ''}}
                       </h4>
                       <h5 class="fw900 mt-4 text-right py-2 pr-2 vb" >Viber {{App\User::where('role','admin')->first()->email}}</h5>
                       </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection


