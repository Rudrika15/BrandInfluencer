@extends('admin.layouts.app')
@section('title', 'Brand beans | Role Create')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Role Create</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card m-3">
                    <div class="card-body">

                        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 p-3">
                        <div class="form-group mb-3">
                            <strong>Permission:</strong><br />
                            <div class="row">
                                @foreach ($permission as $value)
                                    <div class="col-md-3">
                                        <label>
                                            {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                            {{ $value->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('permission')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 text-center py-2">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
