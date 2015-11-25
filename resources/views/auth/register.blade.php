@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    <legend>User Sign up</legend>

                    @include('common.errors')

                    {!! Form::open(['url' => '/auth/register', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Username</label>
                        <div class="col-md-6">
                            {!! Form::text('username', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-6">
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Retype Password</label>
                        <div class="col-md-6">
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>

@endsection