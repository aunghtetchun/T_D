@extends('dashboard.author')
@section("title") Dashboard @endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header fw900 h5">မင်္ဂလာပါ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (auth()->user()->expired_at > \Carbon\Carbon::now()->toDateString())
                        {{-- The expiration date is in the future, calculate the remaining days --}}
                        @php
                         $remainingDays = \Carbon\Carbon::now()->diffInDays(auth()->user()->expired_at); 
                        @endphp
                        <h4 class="fw900 mb-4 " style="line-height: 47px;">သင်၏ အကောင့်သက်တမ်း {{ $remainingDays }} ရက် ကျန်ပါသေးတယ်</h4>
                    @else
                    <h4 class="fw900 mb-4 " style="line-height: 47px;">သင့်အကောင့်မှာ သက်တမ်းကုန်ဆုံးနေပါပြီ...  </h4>
                    <a href="{{ App\User::where('role','admin')->first()->acc}}" class="btn btn-success px-3 py-2">သက်တမ်းတိုးရန်</a>
                    @endif
                     
                </div>
            </div>
            <div class="card shadow shadow-lg">
                <div class="card-body text-center">
                    <p class="h5 fw900 text-danger">အသိပေးကြော်ညာအပ်ပါတယ်ခင်ဗျာ...</p>
                    <p class="h5 fw900 text-danger">**************</p>
                    <p class="px-3 mb-0">Viber {{App\User::where('role','admin')->first()->payment}}</p>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
