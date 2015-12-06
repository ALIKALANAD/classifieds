@extends('layouts.master')

@section('content')

    @if(isset($category))
        <div class="container">
            {!! Breadcrumbs::render('category', $category) !!}
        </div>
    @endif

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

                @include('common.success')

                @if(count($posts) > 0)

                    @foreach($posts as $post)
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <span class="label label-info">
                                    @if($post->hasImages())
                                        Has Image
                                    @else
                                        No Image
                                    @endif
                                </span>&nbsp;&nbsp;

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

                        @if(Request::has('search'))
                            {!! $posts->appends(['search' => Request::get('search')])->render() !!}
                        @else
                            {!! $posts->render() !!}
                        @endif

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