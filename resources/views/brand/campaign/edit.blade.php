@extends('layouts.app')
@section('title', 'Brand beans | Campaign Create')
@section('content')
    <div class='container'>
        <div class="card w-100">
            <div class="card-header justify-content-center p-2">
                <h3>Campaigns</h3>
            </div>
            <div class="card-body">


                <div class='row'>
                    <div class='col-md-12'>
                        <div class="d-flex justify-content-between mb-2">


                        </div>
                    </div>
                </div>
                <div class="container-fluid ">
                    <div class="card-body">

                        <form action="{{ route('brand.campaign.update') }}" enctype="multipart/form-data" method="post"
                            style="margin-top: 15px;">
                            @csrf

                            <input type="hidden" name="campaignId" value="{{ $campaign->id }}">

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" value="{{ $campaign->title }}" id="title"
                                    name="title" required>
                                @error('title')
                                    <span style="color: red">{{ $errors->first('title') }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="detail" class="form-label">Detail</label>
                                <textarea name="detail" id="detail" class="form-control" required>{{ $campaign->detail }}</textarea>
                                @error('detail')
                                    <span style="color: red">{{ $errors->first('detail') }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" value="{{ $campaign->price }}" id="price"
                                    name="price" required>
                                @error('price')
                                    <span style="color: red">{{ $errors->first('price') }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Photo</label>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <input type="file" onchange="readURL(this,'#img1')" class="form-control"
                                                    id="image" name="photo">
                                                @error('photo')
                                                    <span style="color: red">{{ $errors->first('photo') }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-5">
                                                <label for="image"></label>
                                                <img src="{{ asset('campaignPhoto') }}/{{ $campaign->photo }}"
                                                    alt=" {{ __('main image') }}" id="img1"
                                                    style='min-height:100px;min-width:150px;max-height:100px;max-width:150px'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="mb-3">
                                <label for="rule" class="form-label">Rule</label>
                                <input type="text" class="form-control" id="rule" value="{{ $campaign->rule }}"
                                    name="rule" required>
                                @error('rule')
                                    <span style="color: red">{{ $errors->first('rule') }}</span>
                                @enderror
                            </div> --}}

                            <div class="mb-3">
                                <label for="eligibleCriteria" class="form-label">Eligible Criteria</label>
                                <input type="number" class="form-control" value="{{ $campaign->eligibleCriteria }}"
                                    id="eligibleCriteria" name="eligibleCriteria" required>
                                @error('eligibleCriteria')
                                    <span style="color: red">{{ $errors->first('eligibleCriteria') }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="targetGender" class="form-label">Target Gender</label>

                                <select name="targetGender" value="{{ $campaign->targetGender }}" id=""
                                    class="form-control">
                                    <option disabled selected>--Select your Option--</option>
                                    <option value="Male" {{ $campaign->targetGender == 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female" {{ $campaign->targetGender == 'Female' ? 'selected' : '' }}>
                                        Female
                                    </option>
                                    <option value="Both" {{ $campaign->targetGender == 'Both' ? 'selected' : '' }}>Both
                                    </option>

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
                                            value="{{ explode('-', $campaign->targetAgeGroup)[0] ?? old('minTargetAgeGroup') }}"
                                            placeholder="minimum age group" name="minTargetAgeGroup">
                                        @error('minTargetAgeGroup')
                                            <span style="color: red">{{ $errors->first('minTargetAgeGroup') }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" id="maxTargetAgeGroup"
                                            value="{{ explode('-', $campaign->targetAgeGroup)[1] ?? old('maxTargetAgeGroup') }}"
                                            placeholder="maximum age group" name="maxTargetAgeGroup" min="0">
                                        @error('maxTargetAgeGroup')
                                            <span style="color: red">{{ $errors->first('maxTargetAgeGroup') }}</span>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <div class="mb-3">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" value="{{ $campaign->startDate }}" required
                                    id="startDate" name="startDate">
                                @error('startDate')
                                    <span style="color: red">{{ $errors->first('startDate') }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" required value="{{ $campaign->endDate }}"
                                    id="endDate" name="endDate">
                                @error('endDate')
                                    <span style="color: red;">{{ $errors->first('endDate') }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="applyForLastDate" class="form-label">Apply For Last Date</label>
                                <input type="date" class="form-control" value="{{ $campaign->applyForLastDate }}"
                                    id="applyForLastDate" name="applyForLastDate" required>
                                @error('applyForLastDate')
                                    <span style="color: red">{{ $errors->first('applyForLastDate') }}</span>
                                @enderror
                            </div>

                            {{-- <div class="mb-3">
                                <label for="task" class="form-label">Task</label>
                                <input type="text" class="form-control" value="{{ $campaign->task }}" id="task"
                                    name="task" required>
                                @error('task')
                                    <span style="color: red">{{ $errors->first('task') }}</span>
                                @enderror
                            </div> --}}

                            <div class="mb-3">
                                <label for="maxApplication" class="form-label">Max Application</label>
                                <input type="number" class="form-control" value="{{ $campaign->maxApplication }}"
                                    id="maxApplication" name="maxApplication" required>
                                @error('maxApplication')
                                    <span style="color: red">{{ $errors->first('maxApplication') }}</span>
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
