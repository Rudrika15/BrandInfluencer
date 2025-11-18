@extends('admin.layouts.app')
@section('title', 'Brand Beans | Influencer Status Update')
@section('content')
<div class='container'>
    <div class='row'>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class='col-md-12'>
            <div class="d-flex justify-content-between mb-3">
                <div class="p-2">
                    <h3>Influencer Status Update</h3>
                </div>
                <div>
                    <a href="{{ route('influencer.list') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-content">
                <div class="container-fluid">
                    <div class="card" style="width: 30%;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <form action="{{ route('influencer.statusEditCode') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $profile->userId }}" name="influencerId">

                                        <h4 class="mb-3">{{ $profile->profile->username }}</h4>

                                        {{-- ✅ Featured --}}
                                        <div class="form-check mb-2">
                                            <input type="hidden" name="is_featured" value="no">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="is_featured"
                                                value="yes"
                                                id="is_featured"
                                                {{ $profile->is_featured === 'yes' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="is_featured">
                                                Is Featured
                                            </label>
                                        </div>

                                        {{-- ✅ Trending --}}
                                        <div class="form-check mb-2">
                                            <input type="hidden" name="is_trending" value="no">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="is_trending"
                                                value="yes"
                                                id="is_trending"
                                                {{ $profile->is_trending === 'yes' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="is_trending">
                                                Is Trending
                                            </label>
                                        </div>

                                        {{-- ✅ BrandBeans Verified --}}
                                        <div class="form-check mb-3">
                                            <input type="hidden" name="is_brandBeansVerified" value="no">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="is_brandBeansVerified"
                                                value="yes"
                                                id="is_brandBeansVerified"
                                                {{ $profile->is_brandBeansVerified === 'yes' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="is_brandBeansVerified">
                                                Is BrandBeans Verified
                                            </label>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
