@extends('admin.layouts.app')
@section('title', 'Brand beans | Create Brand Category')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Create Brand Category</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('brand.category.index') }}" class="btn btn-primary btn-sm">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">


                        <form action="{{ route('brand.category.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" value="{{ old('categoryName') }}" name="categoryName" id="categoryName" aria-describedby="helpId" placeholder="" />
                                @if ($errors->has('categoryName'))
                                    <span class="text-danger">{{ $errors->first('categoryName') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Icon</label> <span class="text-danger">*</span>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="file" accept="image/*" onchange="readURL(this, '#iconPreview')" class="form-control" name="icon">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ url('images/default.jpg') }}" id="iconPreview" style="min-height:100px;min-width:100px;max-height:100px;max-width:100px;">
                                    </div>
                                </div>
                                @if ($errors->has('icon'))
                                    <span class="text-danger">{{ $errors->first('icon') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Poster</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="file" accept="image/*" onchange="readURL(this, '#posterPreview')" class="form-control" name="poster">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ url('images/default.jpg') }}" id="posterPreview" style="min-height:100px;min-width:100px;max-height:100px;max-width:100px;">
                                    </div>
                                </div>
                            </div>

                            <div style="padding-top: 10px; display: flex; justify-content: center;">

                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            </div>

                        </form>
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

@endsection
