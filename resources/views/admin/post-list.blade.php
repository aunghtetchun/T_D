@extends('dashboard.app')

@section('title')
    TZT
@endsection

@section('content')

    @component('component.breadcrumb', ['data' => []])
        @slot('last')
            Post List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    Post List
                @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <!-- <th scope="col">Type</th> -->
                                    <th scope="col">Label One</th>
                                    <th scope="col">Label Two</th>
                                    <th scope="col">Label Three</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $wp)
                                    <tr>
                                        <!-- <td>{{ $wp->id }}</td> -->
                                        <!-- <td>{{ $wp->type }}</td> -->
                                        <td>{{ $wp->label_one }}</td>
                                        <td>{{ $wp->label_two }}</td>
                                        <td>{{ $wp->label_three }}</td>
                                        <td>{{ $wp->created_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.editPost', $wp->id) }}"
                                                    class="btn mx-2 btn-info btn-sm">
                                                    <i class="feather-edit"></i> Edit
                                                </a>
                                            
                                                <form id="deleteForm" method="POST" action="{{ route('posts.destroy', $wp->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mx-2" onclick="return confirm('Are you sure you want to delete?')"><i class="feather-trash"></i> Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endslot
            @endcomponent
        </div>
        

    </div>
@endsection
@section('foot')
    <script>
        document.getElementById('deleteForm').addEventListener('submit', function (event) {
        if (!confirm('Are you sure you want to delete this item?')) {
            event.preventDefault(); // Prevent form submission if the user clicks "Cancel"
        }
    });
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#previewImg").attr("src", e.target.result);

                }

                reader.readAsDataURL(file);
            }
        }
        $(".table").dataTable();
        $(".table").destory();
        $(".table").dataTable({
            "order": [
                [0, "desc"]
            ]
        });
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").worker().addClass(
            "px-0");
    </script>
@endsection
