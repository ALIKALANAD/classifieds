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
                        {!! Form::hidden('cat-id', $category->id) !!}
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                    <div class="input-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="hasImg" value="1" @if(Request::has('hasImg')) checked @endif> has image
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="onlyTitle" value="1" @if(Request::has('onlyTitle')) checked @endif> search titles only
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="today" value="1" @if(Request::has('today')) checked @endif> posted today
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="user" value="1" @if(Request::has('user')) checked @endif> with username
                            </label>
                        </div>
                    </div>
                {!! Form::close() !!}
                <br>

                @if(!empty($category->sub_categories->toArray()))
                    <div class="panel panel-default">
                        <div class="panel-heading">Categories</div>
                        <div class="panel-body">
                            <ul class="list">
                                @foreach($category->sub_categories as $sub)
                                    <li>
                                        <a href="{{ route('category.show', [$sub->id]) }}">
                                            <i class="fa fa-angle-right"></i>{{ $sub->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if(isset($category))
                                {{--{!! link_to_route('category.show', 'Back', [$category->parent_category->id]) !!}--}}
                                <a href="{{ route('category.show', $category->parent_category->id) }}">Back</a>
                            @endif
                        </div>
                    </div>
                @endif


                @include('layouts.partials.categories')

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

                    <table class="table table-bordered" id="posts">
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <img src="@if($post->hasImages()) {{ $post->images->first()->path }} @else {{ asset(config('classifieds.no-image')) }} @endif" alt="" style="height: 60px; width: 60px;">
                                </td>
                                <td>
                                    <span class="price">$&nbsp;{{ number_format($post->price, 2) }}</span>
                                    <a class="title" href="{{ route('category.post.show', [$post->category->id, $post->id]) }}">{{ $post->title }}</a>
                                    <p class="hidden-sm hidden-xs">
                                        {{ str_limit($post->content, 50) }}
                                    </p>
                                </td>
                                <td><a class="username" href="#">{{ $post->user->username }}</a></td>
                                <td><a class="date-published" href="#" data-toggle="tooltip" title="{{ $post->created_at->toDayDateTimeString() }}">{{ $post->created_at->diffForHumans() }}</a></td>
                                <td class="hidden-xs">{!! link_to_route('category.show', $post->category->id . '&nbsp;&raquo;&nbsp;' . $post->category->name, [$post->category->id], ['class' => 'category']) !!}</td>
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

@section('scripts')
    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>
@endsection