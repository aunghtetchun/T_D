@auth
    <div class="aside-left bg-white px-3 pb-2 min-vh-100 shadow">
        <ul class="menu" style="list-style-type: none">
            <li class="brand-icon">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile/'.Auth::user()->photo) : asset('dashboard/images/profile_default.png') }}" class="brand-icon-img">
                        <small
                            class="text-primary font-weight-bold h5 mb-0 ml-2"> {{ Auth::user()->name }}</small>
                    </div>
                    <button class="btn btn-light d-block d-lg-none aside-menu-close">
                        <i class="feather-x fa-2x"></i>
                    </button>
                </div>
            </li>

            @component('component.nav-item')
                @slot('icon')
                    <i class="feather-calendar"></i>
                @endslot
                @slot('name')
                    နေ့တိုက်
                @endslot
                @slot('link')
                    {{ route('daily')}}
                @endslot
            @endcomponent

            @component('component.nav-item')
                @slot('icon')
                    <i class="feather-save"></i>
                @endslot
                @slot('name')
                    မွေးကဒ်
                @endslot
                @slot('link')
                    {{ route('birthday')}}
                @endslot
            @endcomponent

            @component('component.nav-item')
                @slot('icon')
                    <i class="feather-clock"></i>
                @endslot
                @slot('name')
                    အနီးကပ်
                @endslot
                @slot('link')
                    {{ route('nearest')}}
                @endslot
            @endcomponent
            
            
            @component('component.nav-item')
                @slot('icon')
                    <i class="feather-user-plus"></i>
                @endslot
                @slot('name')
                    အကောင့်သက်တမ်းတိုးရန်
                @endslot
                @slot('link')
                {{ App\User::where('role','admin')->first()->acc}}
                @endslot
            @endcomponent
            @component('component.nav-spacer')
            @endcomponent
            <li>
		@if(auth()->user()->role=='admin')
			<a class="menu-item bg-success"  href="{{route('admin-home')}}"><span class="text-light"><i class="fas fa-user"></i>Change To Admin်</span></a>
		@else
                <a class="menu-item alert-secondary" onclick="logout()" href="#">
                    <span class="text-danger">
                        <i class="fas fa-lock"></i>
                        Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    </span>
                </a>
		@endif
            </li>
        </ul>
    </div>


@endauth
