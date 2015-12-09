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
                    <div class="input-group">
                        <a href="#">Advanced Search</a>
                        <div class="options">

                        </div>
                    </div>
                {!! Form::close() !!}
                <br>

                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(!empty($category->sub_categories->toArray()))
                            <ul>
                                @foreach($category->sub_categories as $sub)
                                    <li><a href="{{ route('category.show', [$sub->id]) }}">{{ $sub->name }}</a></li>
                                @endforeach
                            </ul>
                        @else
                            {!! link_to_route('category.show', 'Back', [$category->parent_category->id]) !!}
                        @endif
                    </div>
                </div>

                {{--@include('layouts.partials.categories')--}}

                @include('layouts.partials.states')

            </div>

            <div class="col-md-9">

                @include('common.success')

                @if(count($posts) > 0)

                    {{--@foreach($posts as $post)--}}
                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-body">--}}

                                {{--<div class="post-image">--}}
                                    {{--<a href="{{ route('category.post.show', [$post->category->id, $post->id]) }}">--}}
                                        {{--<img src="@if($post->hasImages()) {{ $post->images->first()->path }} @else {{ asset('assets/images/no-image.png') }} @endif" alt="">--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="post-info">--}}
                                    {{--<a class="title" href="{{ route('category.post.show', [$post->category->id, $post->id]) }}">{{ $post->title }}</a>--}}
                                    {{--<a class="username" href="#">{{ $post->user->username }}</a>--}}
                                    {{--<span class="date-published">{{ $post->created_at->diffForHumans() }}</span>--}}
                                    {{--{!! link_to_route('category.show', $post->category->id . '&nbsp;&raquo;&nbsp;' . $post->category->name, [$post->category->id], ['class' => 'category']) !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}

                    <table class="table table-bordered">
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td><img src="@if($post->hasImages()) {{ $post->images->first()->path }} @else {{ asset(config('classifieds.no-image')) }} @endif" alt="" style="height: 60px; width: 60px;"></td>
                                <td><a class="title" href="{{ route('category.post.show', [$post->category->id, $post->id]) }}">{{ $post->title }}</a></td>
                                <td><a class="username" href="#">{{ $post->user->username }}</a></td>
                                <td><span class="date-published">{{ $post->created_at->diffForHumans() }}</span></td>
                                <td>{!! link_to_route('category.show', $post->category->id . '&nbsp;&raquo;&nbsp;' . $post->category->name, [$post->category->id], ['class' => 'category']) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

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