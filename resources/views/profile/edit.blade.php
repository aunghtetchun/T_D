@extends('dashboard.app')

@section("title") Edit Profile @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[]])
        @slot("last") Edit Profile @endslot
    @endcomponent

    <div class="row">
       
        <div class="col-12 col-md-4">
            @component("component.card")
                @slot('icon') <i class="mr-1 feather-user text-primary"></i> @endslot
                @slot('title') Change Name @endslot
                @slot('button')  @endslot
                @slot('body')
                    <form action="{{ route('profile.changeName') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-user"></i>
                                Your Name
                            </label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                            @error("name")
                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
                                <label class="custom-control-label" for="customSwitch1">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Name
                            </button>
                        </div>
                    </form>
                @endslot
            @endcomponent
            @component("component.card")
                    @slot('icon') <i class="mr-1 feather-mail text-primary"></i> @endslot
                    @slot('title') Change Info @endslot
                    @slot('button')  @endslot
                    @slot('body')
                        <form action="{{ route('profile.changeEmail') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">
                                    <i class="mr-1 feather-mail"></i>
                                    Your Phone
                                </label>
                                <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                                @error("email")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="acc">
                                    <i class="mr-1 feather-user"></i>
                                    Account
                                </label>
                                <input type="text" name="acc" class="form-control" value="{{ auth()->user()->acc }}">
                                @error("acc")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" required>
                                    <label class="custom-control-label" for="customSwitch3">I'm Sure</label>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="mr-1 feather-refresh-ccw"></i>
                                    Change Info
                                </button>
                            </div>
                        </form>
                    @endslot
                @endcomponent
        </div>

        <div class="col-12 col-md-4">
            @component("component.card")
                @slot('icon') <i class="mr-1 feather-lock text-primary"></i> @endslot
                @slot('title') Change Password @endslot
                @slot('button')  @endslot
                @slot('body')
                    <form action="{{ route('profile.changePassword') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-lock"></i>
                                Current Password
                            </label>
                            <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                            @error("current_password")
                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="current">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Password
                            </label>
                            <input type="password" name="new_password" class="form-control" id="current" placeholder="New Password">
                            @error("new_password")
                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-check"></i>
                                Confirm Password
                            </label>
                            <input type="password" name="new_confirm_password" class="form-control" id="repeat" placeholder="Confirm Password">
                            @error("new_confirm_password")
                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2" required>
                                <label class="custom-control-label" for="customSwitch2">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Now
                            </button>
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div>

    </div>
@endsection
