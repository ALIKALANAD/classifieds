@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="panel panel-default">

            <div class="panel-body">

                @if(count($post) > 0)
                    <h2>{{ $post->title }} &nbsp;&raquo;&nbsp; $ {{ $post->price }}</h2>
                    <h5>
                        {{ $post->created_at->diffForHumans() }} &nbsp;&raquo;&nbsp;
                        {{ $post->user->username }} &nbsp;&raquo;&nbsp;
                        {!! link_to_route('category.show', $post->category->name, [$post->category->id]) !!}
                    </h5>

                    <p>
                        {!! nl2br(e($post->content)) !!}
                    </p>

                @else
                    <h2 style="text-align: center;">No Post Found</h2>
                @endif


            </div>

        </div>

    </div>

@endsection