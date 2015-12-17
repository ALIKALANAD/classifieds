@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body">

                @include('common.errors')

                @if(!empty($category->sub_categories->toArray()))

                    <legend>Select Category</legend>

                    <ol class="categories">
                        @foreach($category->sub_categories as $category)
                            <li>
                                <a href="{{ route('select.category.post.create', $category->id) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ol>

                @else

                    {!! Form::open(['url' => route('select.category.post.store', [$category->id]), 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Title</label>
                        <div class="col-md-6">
                            {!! Form::text('title', null, ['placeholder' => 'title', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Price (USD)</label>
                        <div class="col-md-6">
                            {!! Form::text('price', 0, ['placeholder' => 'Price', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Image/s</label>
                        <div class="col-md-6">
                            {!! Form::file('images[]', array('multiple' => true, 'accept' => 'image/*')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description</label>
                        <div class="col-md-6">
                            {!! Form::textarea('content', null, ['placeholder' => 'content', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}

                @endif

            </div>
        </div>

    </div>

@endsection