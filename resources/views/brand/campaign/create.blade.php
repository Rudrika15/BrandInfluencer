@extends('layouts.app')
@section('title', 'Brand beans | Create Campaign')
@section('content')
    <div class='container'>
        <div class="card w-100">
            <div class="card-header justify-content-center p-2">
                <h3>Campaigns</h3>
            </div>
            <div class="card-body">


                <div class='row'>
                    <div class='col-md-12'>
                        <div class="d-flex justify-content-between mb-3">


                        </div>
                    </div>
                </div>
                <div class="container-fluid ">

                    <form action="{{ route('brand.campaign.store') }}" enctype="multipart/form-data" method="post"
                        style="margin-top: 15px;">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label><span style="color: red">*</span>
                            <input type="text" class="form-control" value="{{ old('title') }}" id="title"
                                name="title">
                            @error('title')
                                <span style="color: red">{{ $errors->first('title') }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="campaignType" class="form-label">Campaign Type</label><span
                                style="color: red">*</span>
                            {{-- radio buttons  for campaign type  --}}
                            <br>
                            <input type="radio" name="campaignType" value="Barter" id="Barter" checked
                                {{ old('campaignType') == 'Barter' ? 'checked' : '' }}>
                            <label for="Barter">Barter</label>
                            <input type="radio" name="campaignType" value="Paid" id="Paid"
                                {{ old('campaignType') == 'Paid' ? 'checked' : '' }}>
                            <label for="Paid">Paid</label>
                            @error('campaignType')
                                <span style="color: red">{{ $errors->first('title') }}</span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="detail" class="form-label">Detail</label><span style="color: red">*</span>
                            <textarea name="detail" id="detail" class="form-control">{{ old('detail') }}</textarea>
                            @error('detail')
                                <span style="color: red">{{ $errors->first('detail') }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label><span style="color: red">*</span>
                            <input type="number" class="form-control" value="{{ old('price') }}" id="price"
                                name="price">
                            @error('price')
                                <span style="color: red">{{ $errors->first('price') }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Photo</label><span
                                        style="color: red">*</span>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="file" accept="image/*" onchange="readURL(this,'#img1')"
                                                class="form-control" id="image" name="photo" require>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="image"></label>
                                            <img src="{{ url('images/default.jpg') }}" alt="{{ __('main image') }}"
                                                id="img1"
                                                style='min-height:100px;min-width:150px;max-height:100px;max-width:150px'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="rule" class="form-label">Rule</label>
                            <input type="text" class="form-control" id="rule" name="rule">
                        </div> --}}

                        <div class="mb-3">
                            <label for="eligibleCriteria" class="form-label">Eligible Criteria</label>
                            <input type="number" min="1" class="form-control" value="{{ old('eligibleCriteria') }}"
                                id="eligibleCriteria" required name="eligibleCriteria">
                            @error('eligibleCriteria')
                                <span style="color: red">{{ $errors->first('eligibleCriteria') }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="targetGender" class="form-label">Target Gender</label>

                            <select name="targetGender" value="{{ old('targetGender') }}" id=""
                                class="form-control">
                                <option disabled selected>--Select your Option--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Both">Both</option>
                            </select>
                            @error('targetGender')
                                <span style="color: red">{{ $errors->first('targetGender') }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="targetAgeGroup" class="form-label">Target Age Group</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="number" id="minTargetAgeGroup" class="form-control" min="0"
                                        value="{{ old('minTargetAgeGroup') }}" placeholder="minimum age group"
                                        name="minTargetAgeGroup">
                                    @error('minTargetAgeGroup')
                                        <span style="color: red">{{ $errors->first('minTargetAgeGroup') }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control" id="maxTargetAgeGroup"
                                        value="{{ old('maxTargetAgeGroup') }}" placeholder="maximum age group"
                                        name="maxTargetAgeGroup" min="0">
                                    @error('maxTargetAgeGroup')
                                        <span style="color: red">{{ $errors->first('maxTargetAgeGroup') }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                value="{{ old('startDate') }}" required id="startDate" name="startDate">
                            @error('startDate')
                                <span style="color: red">{{ $errors->first('startDate') }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" required min="{{ date('Y-m-d') }}"
                                value="{{ old('endDate') }}" id="endDate" name="endDate">
                            @error('endDate')
                                <span style="color: red;">{{ $errors->first('endDate') }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="applyForLastDate" class="form-label">Apply For Last Date</label>
                            <input type="date" required class="form-control" min="{{ date('Y-m-d') }}"
                                value="{{ old('applyForLastDate') }}" id="applyForLastDate" name="applyForLastDate">
                            @error('applyForLastDate')
                                <span style="color: red">{{ $errors->first('applyForLastDate') }}</span>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label for="task" class="form-label">Task</label>
                            <input type="text" class="form-control" value="{{ old('task') }}" id="task" name="task">

                        </div> --}}

                        <div class="mb-3">
                            <label for="maxApplication" class="form-label">Max Application</label>
                            <input type="number" class="form-control" value="{{ old('maxApplication') }}"
                                id="maxApplication" name="maxApplication">
                            {{-- @error('maxApplication')
                                   
                                        <span style="color: red">{{ $errors->first('maxApplication') }}</span>
                                   
                                @enderror --}}
                        </div>

                        <br>
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    </form>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var minAge = parseInt(document.getElementById('minTargetAgeGroup').value);
            document.getElementById('maxTargetAgeGroup').min = minAge + 1;

            var Criteria = parseInt(document.getElementById('eligibleCriteria').value);
            document.getElementById('minTargetAgeGroup').min = Criteria;

            var startDate = document.getElementById('startDate').value;
            document.getElementById('endDate').min = startDate;
            document.getElementById('applyForLastDate').min = startDate;

            var endDate = document.getElementById('endDate').value;
            document.getElementById('applyForLastDate').max = endDate;
        });

        document.getElementById('minTargetAgeGroup').addEventListener('input', function() {
            var minAge = parseInt(this.value);
            document.getElementById('maxTargetAgeGroup').min = minAge + 1;
        });

        document.getElementById('eligibleCriteria').addEventListener('input', function() {
            var Criteria = parseInt(this.value);
            document.getElementById('minTargetAgeGroup').min = Criteria;
        });

        document.getElementById('startDate').addEventListener('input', function() {
            var startDate = this.value;
            document.getElementById('endDate').min = startDate;
            document.getElementById('applyForLastDate').min = startDate;
        });

        document.getElementById('endDate').addEventListener('input', function() {
            var endDate = this.value;
            document.getElementById('applyForLastDate').max = endDate;
        });
    </script>

@endsection
