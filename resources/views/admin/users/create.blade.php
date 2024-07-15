@extends('admin.layouts.app')
@section('title', 'Brand beans | User Create')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>User Create</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, [
                                        'placeholder' => 'Name',
                                        'class' => 'form-control',
                                        'required',
                                        'oninput' => "this.value = this.value.replace(/[^A-Za-z]/g, '')",
                                    ]) !!}
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required']) !!}
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror


                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                                <div class="form-group">
                                    <strong>Profile Photo:</strong>
                                    {!! Form::file('profilePhoto', null, ['class' => 'form-control', 'required']) !!}
                                    @error('profilePhoto')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                                                                                            <div class="form-group">
                                                                                                                                                                <strong>Password:</strong>
                                                                                                                                                                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                                                                                            <div class="form-group">
                                                                                                                                                                <strong>Confirm Password:</strong>
                                                                                                                                                                {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                                                                                                                                            </div>
                                                                                                                                                        </div> -->
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Role:</strong>
                                    {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple', 'required']) !!}
                                    @error('roles')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Mobile Number:</strong>
                                    {!! Form::text('mobileno', null, [
                                        'placeholder' => 'Enter Mobile Number',
                                        'class' => 'form-control',
                                        'required',
                                    ]) !!}
                                    @error('mobileno')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 py-2 text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>

    </div>


@endsection
