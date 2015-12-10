@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="css-table">
            @if(!empty($categories))

                @foreach($categories as $category)
                    <div class="col">
                        <a href="{{ route('category.show', [$category->id]) }}">{{ $category->name }}</a>

                        @if(!empty($category->sub_categories->toArray()))
                            <ol>
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