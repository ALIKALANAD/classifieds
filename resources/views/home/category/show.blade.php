@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-3">

                {!! Form::open(['url' => route('category.index'), 'method' => 'GET', 'class' => 'form-horizontal']) !!}
                    <div class="input-group">


                        {!! Form::text('search', Request::get('search'), ['class' => 'form-control']) !!}

                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                {!! Form::close() !!}
                <br>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            sub-categories
                        </p>
                    </div>
                </div>

                @include('layouts.partials.categories')

                @include('layouts.partials.states')

            </div>

            <div class="col-md-9">

                @if(count($posts) > 0)

                    @foreach($posts as $post)
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <a href="{{ route('category.post.show', [$post->category->id, $post->id]) }}">{{ $post->title }}</a>
                                &raquo;
                                {{ $post->user->username }}
                                &raquo;
                                {{ $post->created_at->diffForHumans() }}
                                <br>
                                {!! link_to_route('category.show', $post->category->id . '&nbsp;&raquo;&nbsp;' . $post->category->name, [$post->category->id]) !!}

                            </div>
                        </div>
                    @endforeach

                    {!! $posts->render() !!}

                @else
                    <h4 style="text-align: center;">No Available Ads</h4>
                @endif


            </div>

            {{--<div class="col-md-2">--}}
                {{--<div class="well">--}}
                    {{--&nbsp;--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>

    </div>

@endsection