@extends('dashboard.app')

@section("title") Edit Post @endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit User @endslot
                @slot('button')
                    
                @endslot
                @slot('body')
                <form method="POST" action="{{ route('admin.updateUser',$user->id) }}">
                    @method('PUT')
                    @csrf
        
                    <div class="form-group">
                        <label for="lable_one">Name</label>
                        <input type="text" name="label_one" disabled class="form-control" id="lable_one" value="{{ $user->name}}">
                    </div>
        
                    <div class="form-group">
                        <label for="label_two">Expired Date</label>
                        <input type="text" placeholder="2023-11-12" id="expired_at" name="expired_at" class="form-control" value="{{ old('expired_at') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update User</button>

                    @endslot
                </form>
                    @endcomponent
        </div>
       
                      

    </div>
@endsection
@section('foot')
    <script>
        // $(document).ready(function() {
        //     $('#description').summernote({
        //         height: 140,                 // set editor height
        //         minHeight: null,             // set minimum height of editor
        //         maxHeight: null,             // set maximum height of editor
        //         focus: true
        //     });



        // });
    </script>
@endsection
