@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="col-md-3">

            @include('user.partials.sidebar')

        </div>

        <div class="col-md-9">

            <div class="panel panel-default">

                <div class="panel-body">

                    <table id="user-posts-table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th data-sortable="false">Action</th>
                        </tr>
                        </thead>

                        @if(!empty($posts))

                            <tbody>
                                @foreach($posts as $post)

                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>
                                            <a href="#">{{ $post->title }}</a>
                                        </td>
                                        <td><a href="#" data-toggle="tooltip" title="{{ $post->created_at->toDayDateTimeString() }}">{{ $post->created_at->diffForHumans() }}</a></td>
                                        <td>
                                            <a href="#" data-toggle="tooltip" title="Edit this Ad"><i class="fa fa-edit"></i></a>
                                            <a href="#" data-toggle="tooltip" title="Unpublish this Ad"><i class="fa fa-remove"></i></a>
                                            <a href="#" data-toggle="tooltip" title="Remove this Ad"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        @endif
                    </table>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#user-posts-table').DataTable({
//            "pageLength": 25,
        });
    </script>
@endsection