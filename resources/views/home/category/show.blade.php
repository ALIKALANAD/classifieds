@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">All Categories</div>
                    <div class="panel-body">
                        @include('layouts.partials.categories')
                    </div>
                </div>

            </div>

            <div class="col-md-7">


                {!! Form::open(['url' => '', 'class' => 'form-inline']) !!}

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                        {!! Form::text('search', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>

                {!! Form::close() !!}


                @if(!empty($posts))

                    @foreach($posts as $post)
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <a href="{{ route('category.post.show', [$post->category->id, $post->id]) }}">{{ $post->title }}</a>
                                <br>
                                {{ $post->created_at->diffForHumans() }}
                                <br>
                                {{ $post->user->username }}

                            </div>
                        </div>
                    @endforeach

                    {!! $posts->render() !!}

                @endif


            </div>

            <div class="col-md-2">
                <div class="well">
                    &nbsp;
                </div>
            </div>

        </div>

    </div>

@endsection