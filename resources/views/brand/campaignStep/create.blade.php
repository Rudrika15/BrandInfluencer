{{-- @extends('extra.master')
@section('title', 'Brand beans | Create Campaign Step')
@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Create Campaign Step</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('brand.campaign.step.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('brand.campaign.step.store') }}" enctype="multipart/form-data" method="post" style="margin-top: 15px;">
                            @csrf

                            <div class="mb-3">
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
                            </div>

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


@endsection --}}



@extends('extra.master')
@section('title', 'Brand Beans | Campaign Steps')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Campaign Steps</h3>
        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">+ Add Step</button>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Campaign</th>
                        <th>Title</th>
                        <th>Detail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($steps as $step)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $step->campaign->title ?? '-' }}</td>
                            <td>{{ $step->title }}</td>
                            <td>{{ $step->detail }}</td>
                            <td>
                                <button 
                                    class="btn btn-primary btn-sm editBtn"
                                    data-id="{{ $step->id }}"
                                    data-campaign="{{ $step->campaignId }}"
                                    data-title="{{ $step->title }}"
                                    data-detail="{{ $step->detail }}">
                                    Edit
                                </button>

                                <form action="{{ route('brand.campaign.step.destroy', $step->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this step?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No steps found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- CREATE MODAL -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('brand.campaign.step.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Step</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label>Campaign</label>
                    <select name="campaignId" class="form-control" required>
                        <option value="">-- Select Campaign --</option>
                        @foreach ($campaigns as $c)
                            <option value="{{ $c->id }}">{{ $c->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Detail</label>
                    <textarea name="detail" class="form-control" required></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('brand.campaign.step.update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="edit_id">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Step</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label>Campaign</label>
                    <select name="campaignId" id="edit_campaignId" class="form-control" required>
                        @foreach ($campaigns as $c)
                            <option value="{{ $c->id }}">{{ $c->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" id="edit_title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Detail</label>
                    <textarea name="detail" id="edit_detail" class="form-control" required></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
  </div>
</div>

<script>
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('edit_id').value = this.dataset.id;
            document.getElementById('edit_campaignId').value = this.dataset.campaign;
            document.getElementById('edit_title').value = this.dataset.title;
            document.getElementById('edit_detail').value = this.dataset.detail;
            new bootstrap.Modal(document.getElementById('editModal')).show();
        });
    });
</script>

@endsection
