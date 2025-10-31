@extends('layouts.app')
@section('title', 'Brand beans | Brands')
@section('content')

    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Steps</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Steps</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                    {{-- <th>Status</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($campaignStep as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->detail }}</td>
                                        <td>
                                            <?php
                                            $counter = 0;
                                            foreach ($content as $contentData) {
                                                if ($contentData->stepId === $data->id) {
                                                    $counter++;
                                                }
                                            }
                                            ?>

                                            @if ($counter < 1)
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#uploadModal-{{ $data->id }}">
                                                    Upload Step
                                                </button>
                                            @else
                                                <span class="text-success">Uploaded</span>
                                            @endif
                                        </td>

                                        {{-- <td class="text-warning">{{ $contentData->brandApproved ?? '' }}</td> --}}

                                        <!-- Modal -->
                                        <div class="modal fade" id="uploadModal-{{ $data->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="uploadModalLabel-{{ $data->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="uploadModalLabel-{{ $data->id }}">
                                                            Upload your content Proof
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('influencer.campaign.step.store') }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="stepId"
                                                                value="{{ $data->id }}">
                                                            <input type="hidden" name="campaignId"
                                                                value="{{ request('campaignId') }}">

                                                            <label for="uploadActivityPhoto-{{ $data->id }}">Upload
                                                                Screenshot</label>
                                                            <input type="file" class="form-control"
                                                                name="uploadActivityPhoto"
                                                                id="uploadActivityPhoto-{{ $data->id }}">

                                                            <div class="my-2 text-center"><b>OR</b></div>

                                                            {{-- <label for="uploadActivityLink-{{ $data->id }}">Upload URL</label>
                                                                <input type="text" class="form-control" name="uploadActivityLink" id="uploadActivityLink-{{ $data->id }}" placeholder="Put your URL here.."> --}}
                                                            {{-- <input type="file" class="form-control" name="uploadActivityLink" accept="video/*"> --}}


                                                            <label for="uploadActivityVideo-{{ $data->id }}">Upload
                                                                Video</label>
                                                            <input type="file" class="form-control"
                                                                name="uploadActivityLink" id="uploadActivityLink"
                                                                accept="video/mp4">

                                                            <div class="mt-3 text-end">
                                                                <button type="submit"
                                                                    class="btn btn-success btn-sm">Submit</button>
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
