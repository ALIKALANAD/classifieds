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
                                        <td>{{ $post->created_at->diffForHumans() }} <span class="label label-info">{{ $post->created_at }}</span></td>
                                        <td>
                                            <a href="#"><i class="fa fa-edit"></i></a>
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

