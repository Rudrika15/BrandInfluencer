@extends('layouts.app')
@section('title', 'Brand Beans | Edit Campaign')
@section('content')

<div class='container'>
    <div class="card w-100">
        <div class="card-body">
            <div class='row'>
                <div class='col-md-12'>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="p-2">
                            <h3 class="line-title">Edit Campaign</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="card-body">

                    {{-- ✅ Correct Form --}}
                    <form id="editCampaignForm" 
                          action="{{ route('brand.campaign.update') }}" 
                          method="POST" 
                          enctype="multipart/form-data" 
                          style="margin-top: 15px;">
                        
                        @csrf
                       
                        
                        <input type="hidden" name="campaignId" value="{{ $campaign->id }}">

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" value="{{ $campaign->title }}" id="title"
                                   name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="detail" class="form-label">Detail</label>
                            <textarea name="detail" id="detail" class="form-control" required>{{ $campaign->detail }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" value="{{ $campaign->price }}" id="price"
                                   name="price" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="file" onchange="readURL(this,'#img1')" 
                                                   class="form-control" id="photo" name="photo">
                                        </div>
                                        <div class="col-md-5">
                                            <img src="{{ asset('campaignPhoto/'.$campaign->photo) }}" 
                                                 alt="Main image" id="img1"
                                                 style='min-height:100px;min-width:150px;max-height:100px;max-width:150px'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="eligibleCriteria" class="form-label">Eligible Criteria</label>
                            <input type="text" class="form-control" value="{{ $campaign->eligibleCriteria }}"
                                   id="eligibleCriteria" name="eligibleCriteria" required>
                        </div>

                        <div class="mb-3">
                            <label for="targetGender" class="form-label">Target Gender</label>
                            <input type="text" class="form-control" value="{{ $campaign->targetGender }}"
                                   id="targetGender" name="targetGender" required>
                        </div>

                        <div class="mb-3">
                            <label for="targetAgeGroup" class="form-label">Target Age Group</label>
                            <input type="text" class="form-control" value="{{ $campaign->targetAgeGroup }}"
                                   id="targetAgeGroup" name="targetAgeGroup" required>
                        </div>

                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" value="{{ $campaign->startDate }}"
                                   id="startDate" name="startDate" required>
                        </div>

                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" value="{{ $campaign->endDate }}"
                                   id="endDate" name="endDate" required>
                        </div>

                        <div class="mb-3">
                            <label for="applyForLastDate" class="form-label">Apply For Last Date</label>
                            <input type="date" class="form-control" value="{{ $campaign->applyForLastDate }}"
                                   id="applyForLastDate" name="applyForLastDate" required>
                        </div>

                        <div class="mb-3">
                            <label for="maxApplication" class="form-label">Max Application</label>
                            <input type="number" class="form-control" value="{{ $campaign->maxApplication }}"
                                   id="maxApplication" name="maxApplication" required>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-success btn-sm">Update Campaign</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- ✅ Preview Uploaded Image --}}
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

{{-- ✅ Console Debugging for Form Submission --}}
<script>
document.getElementById('editCampaignForm').addEventListener('submit', function(e) {
    console.log("🟢 Form submission started...");

    const formData = new FormData(this);
    console.log("📦 Form Data (before sending):");
    for (let [key, value] of formData.entries()) {
        console.log(`${key}:`, value);
    }

    console.log("🚀 Submitting form to Laravel...");
});
</script>

@endsection
