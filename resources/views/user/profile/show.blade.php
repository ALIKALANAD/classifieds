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

                    {!! Form::open(array('url' => route('user.profile.update', [$user->id]), 'class' => 'form-horizontal', 'role' => 'form')) !!}
                    {!! Form::hidden('_method', 'PUT') !!}

                    <div class="form-group">
                        <label class="col-md-4 control-label">First Name</label>
                        <div class="col-md-6">
                            {!! Form::text('first_name', $user->first_name, array('class' => 'form-control', 'placeholder' => 'First Name')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Last Name</label>
                        <div class="col-md-6">
                            {!! Form::text('last_name', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Last Name')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Contact No</label>
                        <div class="col-md-6">
                            {!! Form::text('contact_no', $user->contact_no, array('class' => 'form-control', 'placeholder' => 'Contact No')) !!}
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

