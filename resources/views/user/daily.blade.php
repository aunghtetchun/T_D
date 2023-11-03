@extends('dashboard.author')
@section("title") Dashboard @endsection

@section('content')
<style>
   
</style>
    <div class="row justify-content-center">                                                           
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-start pt-2 px-0" >
                  
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
                    <div class="card shadow-lg  mx-3 mt-2">
                       <div class="card-body pb-1 text-center">
                       <div class="d-flex justify-content-center">
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo2 mr-1">
                            <h6 class="mvip " style="font-size:1.4rem"> Myanmar VIP</h6>
                            <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class=" lgo2 ml-1">
                        </div>
                       <div class="d-flex justify-content-around my-2">
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
                       <h5 class="fw900 mt-2 text-right py-2 pr-2 vb" >Viber {{App\User::where('role','admin')->first()->email}}</h5>
                       </div>
                    </div>
                    
                    
                </div>
                 </div>

                 <div class="card mt-2">
                        <div class="card-header">
                           နေ့တိုက် History
                        </div>
                        <div class="card-body p-2">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr class="bg-dark text-light">
                                <th scope="col">ရက်စွဲ</th>
                                <th scope="col">လုံးဘိုင်</th>
                                <th scope="col">ပေးဂဏန်း</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(App\Post::where('type',1)->get() as $daily)
                                <tr>
                                <td class="bg-danger text-light">{{Carbon\Carbon::parse($daily->created_at)->toDateString()}}</td>
                                <td class="bg-primary text-light">
                                {{$daily->label_one }} - {{ $daily->label_two }}
                                </td>
                                <td class="bg-success text-light">{{ $daily->label_three }} </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
           
                </div>
    </div>

@endsection


