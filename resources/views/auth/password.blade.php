@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    <legend>Forgot Password</legend>

                    @include('common.errors')
                    @include('common.success')

                    {!! Form::open(['url' => '/password/email', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>

@endsection