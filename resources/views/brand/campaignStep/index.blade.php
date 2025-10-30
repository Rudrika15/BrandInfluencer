@extends('layouts.app')
@section('title', 'Brand beans | Campaign Step')
@section('content')
    <div class='container'>
        <!-- Add this to your Blade template -->
        {{-- <div class='row'>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Campaign Step</h3>
                    </div>
                    <div class=" p-2">
                        <a class="btn btn-primary" href="{{ route('brand.campaignStep.create') }}">
                            Add Campaign step
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('brand.campaignStep.table')
                    </div>
                </div>
            </div>
        </div> --}}

        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="p-2">
                            <h3>Create Campaign Step</h3>
                        </div>
                        <div class="p-2">
                            <a href="{{ route('brand.campaign.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('brand.campaignStep.store') }}" enctype="multipart/form-data"
                                method="post" style="margin-top: 15px;">
                                @csrf



                                {{-- <div class="mb-3">
                                <label for="campaignId" class="form-label">Campaign</label>
                                <select name="campaignId" class="form-control" id="campaignId">
                                    <option disabled selected>--Select your Option</option>
                                    @foreach ($campaign as $campaign)
                                        <option value="{{ $campaign->id }}">{{ $campaign->title }}</option>
                                    @endforeach
                                </select>
                                @error('campaignId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}


                                <input value="{{ request('id') }}" name="campaignId" type="hidden">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="detail" class="form-label">Detail</label>
                                    <textarea name="detail" id="detail" class="form-control" required></textarea>
                                    @error('detail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <br>
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

        </div>
{{-- campaign list --}}
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h3>Campaign Steps List</h3>
                    <div class="card">
                        <div class="card-body">
                            @include('brand.campaignStep.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script>
            function readURL(input, tgt) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector(tgt).setAttribute("src", e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

    </div>


@endsection
