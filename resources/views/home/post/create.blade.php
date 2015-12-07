@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body">

                @include('common.errors')

                @if(!empty($category->sub_categories->toArray()))
                    <legend>Select Category</legend>
                    @foreach($category->sub_categories as $category)
                        <a href="{{ route('select.category.post.create', $category->id) }}">{{ $category->name }}</a>
                        &nbsp;&nbsp;&nbsp;
                    @endforeach
                @else

                    {!! Form::open(['url' => route('select.category.post.store', [$category->id]), 'files' => true, 'enctype' => 'multipart/form-data']) !!}

                    {!! Form::text('title', null, ['placeholder' => 'Title']) !!}
                    <br>
                    {!! Form::text('price', 0, ['placeholder' => 'Price']) !!}
                    <br>
                    {!! Form::file('images[]', array('multiple' => true, 'accept' => 'image/*')) !!}
                    <br>
                    {!! Form::textarea('content', null, ['placeholder' => 'content']) !!}
                    <br>
                    {!! Form::submit('Submit') !!}

                    {!! Form::close() !!}

                @endif


            </div>
        </div>

    </div>

@endsection