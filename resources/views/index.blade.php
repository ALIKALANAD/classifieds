@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="lists">
            @if(!empty($categories))

                @foreach($categories as $category)
                    <div class="category">
                        <a class="title" href="{{ route('category.show', [$category->id]) }}" data-toggle="tooltip" title="{{ $category->count_total_posts() }} ads available">{{ $category->name }}</a>

                        @if(!empty($category->sub_categories->toArray()))
                            <ol class="categories">
                                @foreach($category->sub_categories as $sub)
                                    <li>
                                        <a href="{{ route('category.show', [$sub->id]) }}">{{ $sub->name }}</a>
                                    </li>
                                @endforeach
                            </ol>
                        @endif

                    </div>
                @endforeach

            @endif
        </div>

    </div>

@endsection