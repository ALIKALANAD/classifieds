@extends('layouts.master')


@section('styles')
    <style>
        h1 {text-align: center; vertical-align: middle}
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="content">
            <h1>Laravel 5</h1>
            {{ Hash::make('password1') }}
        </div>
    </div>

@endsection

