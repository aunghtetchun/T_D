@extends('dashboard.app')

@section("title") Edit Post @endsection

@section('content')

    

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit Post @endslot
                @slot('button')
                    
                @endslot
                @slot('body')
                <form method="POST" action="{{ route('admin.updatePost',$post->id) }}">
                    @method('PUT')
                    @csrf
        
                    <div class="form-group">
                        <label for="lable_one">Label 1</label>
                        <input type="text" name="label_one" class="form-control" id="lable_one" value="{{ $post->label_one}}" required>
                    </div>
        
                    <div class="form-group">
                        <label for="label_two">Label 2</label>
                        <input type="text" name="label_two" class="form-control" id="label_two" value="{{ $post->label_two}}" required>
                    </div>

                    <div class="form-group">
                        <label for="label_three">Label 3</label>
                        <input type="text" name="label_three" class="form-control" id="label_three" value="{{ $post->label_three}}" required>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update Post</button>

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
