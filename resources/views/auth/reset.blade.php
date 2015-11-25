@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    <legend>New Password</legend>

                    @include('common.errors')

                    {!! Form::open(['url' => '/password/reset', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        {!! Form::hidden('token', $token) !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">New Password</label>
                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Retype New Password</label>
                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Submit', array('class' => 'btn primary')) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>

@endsection