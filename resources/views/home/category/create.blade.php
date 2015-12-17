@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body">

                <legend>Select Category</legend>

                @if(!empty($categories))
                    <ol class="categories">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('select.category.post.create', $category->id) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ol>

                @endif

            </div>
        </div>

    </div>

@endsection