@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="col-md-3">

            @include('user.partials.sidebar')

        </div>

        <div class="col-md-9">

            <div class="panel panel-default">

                <div class="panel-body">
                    @include('common.success')
                    @include('common.errors')


                    {!! Form::open(['url' => route('user.settings.update'), 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    {!! Form::hidden('_method', 'PUT') !!}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Username</label>
                        <div class="col-md-6">
                            {!! Form::text('username', $user->username, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-6">
                            {!! Form::text('email', $user->email, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                    </div>

                    <div id="change-password-content">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Password</label>
                            <div class="col-md-6">
                                {!! Form::password('current_password', ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">New Password</label>
                            <div class="col-md-6">
                                {!! Form::password('new_password', ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Retype New Password</label>
                            <div class="col-md-6">
                                {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="#" role="button" id="show-change-form">Change Password</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Save Changes', array('class' => 'btn btn-success')) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script>
        $('#change-password-content').hide();
        $('#show-change-form').click(function() {
            var action = $('#show-change-form');
            $('#change-password-content').slideToggle(function() {
                if($(this).is(':hidden')) {
                    action.html('Change Password');
                } else {
                    action.html('Cancel');
                }
            });
        });
    </script>
@endsection

