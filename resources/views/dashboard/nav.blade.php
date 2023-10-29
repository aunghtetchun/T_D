@auth
    <div class="aside-left bg-white px-3 pb-2 min-vh-100 shadow">
        <ul class="menu" style="list-style-type: none">
            <li class="brand-icon">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class="brand-icon-img">
                        <small
                            class="text-primary font-weight-bold h5 mb-0 ml-2">{{ \App\Custom::$info['short_name'] }}</small>
                    </div>
                    <button class="btn btn-light d-block d-lg-none aside-menu-close">
                        <i class="feather-x fa-2x"></i>
                    </button>
                </div>
            </li>
            <li>
                <a class="menu-item mt-3" href="{{ route('home') }}">
                    <span>
                        <i class="feather-user"></i>
                        Change to User
                    </span>
                </a>
            </li>
            @component('component.nav-spacer')
            @endcomponent
            @component('component.nav-title')
                User Management
            @endcomponent

            @component('component.nav-item')
                @slot('icon') <i class="feather-list"></i> @endslot
                @slot('name') User List @endslot
                @slot('link'){{route('admin.userList')}} @endslot
                @slot('count')
                {{ \App\User::where('role','user')->count() }}   
                @endslot
            @endcomponent
            @component('component.nav-item')
                @slot('icon') <i class="feather-edit"></i> @endslot
                @slot('name') Edit Info @endslot
                @slot('link'){{ route('profile.edit') }} @endslot
                @slot('count')
                
                @endslot
            @endcomponent

            @component('component.nav-title')
                Post Management
            @endcomponent

            @component('component.nav-item')
                @slot('icon') <i class="feather-plus-circle"></i> @endslot
                @slot('name') Add Post @endslot
                @slot('link'){{route('admin.createPost')}} @endslot
            @endcomponent

            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-list"></i>
                @endslot
                @slot('name')
                    နေ့တိုက် 
                @endslot
                @slot('link')
                {{route('admin.postOneList')}}
                @endslot
                @slot('count')
                {{ \App\Post::where('type',1)->count() }}   
                @endslot
            @endcomponent
            
            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-list"></i>
                @endslot
                @slot('name')
                    မွေးက‌ဒ် 
                @endslot
                @slot('link')
                {{route('admin.postTwoList')}}
                @endslot
                @slot('count')
                {{ \App\Post::where('type',2)->count() }}   
                @endslot
            @endcomponent
            
            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-list"></i>
                @endslot
                @slot('name')
                    အနီးကပ်
                @endslot
                @slot('link')
                {{route('admin.postThreeList')}}
                @endslot
                @slot('count')
                {{ \App\Post::where('type',3)->count() }}   
                @endslot
            @endcomponent
            
            @component('component.nav-spacer')
            @endcomponent
            <li>
                <a class="menu-item alert-secondary" onclick="logout()" href="#">
                    <span>
                        <i class="fas fa-lock"></i>
                        Logout
                    </span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
    </div>


@endauth
