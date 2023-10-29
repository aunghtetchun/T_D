@extends('dashboard.author')
@section("title") Dashboard @endsection

@section('content')
<style>
   
</style>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-start pt-2 px-0">
                  
                    <div class="text-center mtxt mt-3" >
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo mr-1">
                            <h6 class="mvip">Myanmar VIP</h6>
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo ml-1">
                        </div>
                       
                        <h4 class="mco"> အနီးကပ်</h4>
                        <h4 class="my-3"> {{ \Carbon\Carbon::now()->format('M d, Y') }} </h4>
                        <h4 > {{$daily_num ? $daily_num->label_one : 'မျှော်'}}</h4>
                    </div>
                    <div class="card shadow-lg  mx-3 mt-2">
                       <div class="card-body pb-1 text-center">
                       <div class="d-flex justify-content-center">
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo2 mr-1">
                            <h6 class="mvip " style="font-size:1.4rem"> Myanmar VIP</h6>
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo2 ml-1">
                        </div>
                        <h5 class="fw900 mt-4">ဆရာ့အကြိုက်ပတ်သီး - {{ $daily_num ? $daily_num->label_two : 'မျှော်'}}</h5>
                        <h4 class=" mt-4 mb-2 tbr" style="font-size: 25px;"> 
                      အထူးရွေးကွက် {{$daily_num ? $daily_num->label_three : 'မျှော်'}}
                       </h4>
                      
                       <h5 class="fw900 mt-4 text-right py-2 pr-2 vb" >Viber {{App\User::where('role','admin')->first()->email}} </h5>
                       </div>
                    </div>
                    
                </div>
            </div>
            <div class="card mt-2">
                        <div class="card-body px-0">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                <th scope="col">ရက်စွဲ</th>
                                <th scope="col">ပေးဂဏန်း</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(App\Post::where('type',3)->get() as $daily)
                                <tr>
                                <td>{{Carbon\Carbon::parse($daily->created_at)->toDateString()}}</td>
                                <td> ( {{$daily->label_one }} ) &nbsp;{{ $daily->label_two }} &nbsp;{{ $daily->label_three }} </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
           
        </div>
    </div>

@endsection


