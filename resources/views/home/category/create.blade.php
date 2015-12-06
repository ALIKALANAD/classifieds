@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body">

                <legend>Select Category</legend>

                @if(!empty($categories))
                    @foreach($categories as $category)
                        <a href="{{ route('select.category.post.create', $category->id) }}">{{ $category->name }}</a>
                        &nbsp;&nbsp;&nbsp;
                    @endforeach
                @endif

            </div>
        </div>

    </div>

@endsection