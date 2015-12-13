@extends('layouts.master')

@section('content')
    <div class="container">

        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    <?php
                        /*
                        $ip = (object) GeoIP::getLocation("14.203.96.226");
                        echo $ip->ip . "<br>";
                        echo $ip->isoCode . "<br>";
                        echo $ip->country . "<br>";
                        echo $ip->city . "<br>";
                        echo $ip->state . "<br>";
                        echo $ip->postal_code . "<br>";
                        echo $ip->timezone . "<br>";
                        echo $ip->continent . "<br>";
                        */
                    ?>

                    <legend>Traydes Sign in</legend>

                    @include('common.errors')

                    {!! Form::open(['url' => '/auth/login', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) !!}

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
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('password/email') }}">Forgot Password?</a>
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