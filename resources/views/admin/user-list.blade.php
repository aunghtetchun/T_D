@extends('dashboard.app')

@section('title')
    TZT
@endsection

@section('content')

    @component('component.breadcrumb', ['data' => []])
        @slot('last')
            User List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    User List
                @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone No.</th>
                                    <th scope="col">Expired Date</th>
                                    <th scope="col">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $wp)
                                    <tr>
                                        <!-- <td>{{ $wp->id }}</td> -->
                                        <td>{{ $wp->name }}</td>
                                        <td>{{ $wp->email }}</td>
                                        <td>{{ $wp->expired_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.editUser', $wp->id) }}"
                                                    class="btn mx-2 btn-info btn-sm">
                                                    <i class="feather-edit"></i> Edit
                                                </a>
                                            
                                                <form id="deleteForm" method="POST" action="{{ route('users.destroy', $wp->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mx-2" onclick="return confirm('Are you sure you want to delete?')"><i class="feather-trash"></i></button>
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
