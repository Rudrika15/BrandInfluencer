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

                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Name --}}
                            <div class="form-group mb-3">
                                <label for="name"><strong>Name:</strong></label>
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="form-group mb-3">
                                <label for="email"><strong>Email:</strong></label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Profile Photo --}}
                            <div class="form-group mb-3">
                                <label for="profilePhoto"><strong>Profile Photo:</strong></label>
                                <input type="file" name="profilePhoto" class="form-control">
                                @error('profilePhoto')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Role --}}
                            <div class="form-group mb-3">
                                <label for="roles"><strong>Role:</strong></label>
                                <select name="roles[]" class="form-control" multiple>
                                    @foreach ($roles as $id => $roleName)
                                        <option value="{{ $id }}" {{ collect(old('roles'))->contains($id) ? 'selected' : '' }}>
                                            {{ $roleName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('roles')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Mobile Number --}}
                            <div class="form-group mb-3">
                                <label for="mobileno"><strong>Mobile Number:</strong></label>
                                <input type="text" name="mobileno" class="form-control" placeholder="Enter Mobile Number" value="{{ old('mobileno') }}">
                                @error('mobileno')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
