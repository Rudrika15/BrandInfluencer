<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profle</title>
    <link rel="stylesheet" href="{{ asset('influencerbrand/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .nav-pills .nav-link {
            border-radius: 50px;

        }

        .tab-content>.tab-pane {
            padding: 20px;
        }

        .nav-link.active {
            background-color: #1d4880 !important;

        }

        .nav-link.active:hover {
            color: white !important;
        }

        .nav-link {
            color: #1d4880;

        }
    </style>
</head>

<body>
    <header class="site-header ">
        <div class="image-text d-flex">
            <span class="image">
                <a href="{{ route('home') }}"><img src="{{ asset('images/Logo2.png') }}" alt="logo" height="40px"
                        width="40px" /></a>
            </span>
            <div class="text header-text ms-3 mt-1">
                <span class="main">Brand</span>
                <span class="sub">Beans</span>
            </div>
        </div>

    </header>
    <div class="container-fluid p-5 bg-light">
        <div class="row">

            <div class="col-3">
                <div class="card h-100 w-100">
                    <div class="nav flex-column nav-pills mt-2" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill"
                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                            aria-selected="true">Profile</a>
                        <a class="nav-link mt-2" id="v-pills-links-tab" data-bs-toggle="pill" href="#v-pills-links"
                            role="tab" aria-controls="v-pills-links" aria-selected="false"> Social Links</a>
                        <a class="nav-link mt-2" id="v-pills-Payment-tab" data-bs-toggle="pill" href="#v-pills-Payment"
                            role="tab" aria-controls="v-pills-Payment" aria-selected="false">Payment</a>
                        <a class="nav-link mt-2" id="v-pills-service-tab" data-bs-toggle="pill" href="#v-pills-service"
                            role="tab" aria-controls="v-pills-service" aria-selected="false"> Service Details</a>
                        <a class="nav-link mt-2" id="v-pills-qr-tab" data-bs-toggle="pill" href="#v-pills-qr"
                            role="tab" aria-controls="v-pills-qr" aria-selected="false">Qr-Codes</a>
                        <a class="nav-link mt-2" id="v-pills-Slider-tab" data-bs-toggle="pill" href="#v-pills-Slider"
                            role="tab" aria-controls="v-pills-Slider" aria-selected="false"> Slider Images</a>
                        <a class="nav-link mt-2 mb-3" id="v-pills-Brochure-tab" data-bs-toggle="pill"
                            href="#v-pills-Brochure" role="tab" aria-controls="v-pills-Brochure"
                            aria-selected="false">
                            Brochure</a>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content " id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <div class="card w-100">
                            <div class="card-body">
                                <form action="" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 pb-1">
                                            {{-- <input type="hidden" name="cardid" value="{{ $users->id }}"> --}}

                                            <div class="row">
                                                <div class="col-md-4"><label>Your Full Name:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control " id="name"
                                                        name="name" value="{{ $users->name }}">

                                                </div>
                                            </div>
                                        </div>
                                        @if (!Auth::user()->hasRole('Influencer'))
                                            <div class="col-md-6 pb-1">
                                                <div class="row">
                                                    <div class="col-md-4"><label>Designation:</label></div>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control " id="heading"
                                                            name="heading" value="{{ $users->heading }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pb-1">
                                                <div class="row">
                                                    <div class="col-md-4"><label>Company Name:</label></div>
                                                    <div class="col-md-7">
                                                        <input type="text" class=" form-control" id="companyname"
                                                            name="companyname" value="{{ $users->companyname }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label>Username:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class=" form-control" id="username"
                                                        name="username" value="{{ $users->username }}">
                                                </div>
                                            </div>
                                        </div>
                                        @if (!Auth::user()->hasRole('Influencer'))
                                            <div class="col-md-6 pb-1">
                                                <div class="row">
                                                    <div class="col-md-4"><label>State:</label></div>
                                                    <div class="col-md-7">
                                                        <input type="text" class=" form-control" id="state"
                                                            name="state" value="{{ $users->state }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label>City:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control " id="location"
                                                        name="city" value="{{ $users->city }}">
                                                </div>
                                            </div>
                                        </div>
                                        @if (!Auth::user()->hasRole('Influencer'))
                                            <div class="col-md-6 pb-1">
                                                <div class="row">
                                                    <div class="col-md-4"><label>Address:</label></div>
                                                    <div class="col-md-7">
                                                        <textarea type="text" class="form-control " id="address" name="address">{{ $users->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label>Profile Photo:</label></div>
                                                <div class="col-md-5">
                                                    <input type="file" accept="image/*" class="form-control "
                                                        id="profilePhoto" name="profilePhoto"
                                                        value="{{ url('profile') }}/{{ $users->profilePhoto }}">
                                                    @if ($errors->has('profilePhoto'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('profilePhoto') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ url('profile') }}/{{ $users->profilePhoto }}"
                                                        class="img-fluid" alt="Responsive image">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label>Logo:</label></div>
                                                <div class="col-md-5">
                                                    <input type="file" class="form-control " id="logo"
                                                        name="logo">
                                                    @if ($errors->has('logo'))
                                                        <span class="text-danger">{{ $errors->first('logo') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ url('cardlogo') }}/{{ $users->logo }}"
                                                        class="img-fluid" alt="Responsive image">
                                                </div>
                                            </div>
                                        </div>
                                        @if (!Auth::user()->hasRole('Influencer'))
                                        @endif

                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label>Category:</label></div>
                                                <div class="col-md-7">
                                                    <select name="category" id="category" class=" form-control">
                                                        <option selected disabled>--Update your Category--</option>
                                                        {{-- @foreach ($category as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category', $users->category) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach --}}
                                                        <option value="other">Other</option>
                                                    </select>

                                                    <div class="frm-input py-3" id="other"
                                                        style="display: none;">
                                                        <input type="text" placeholder="Add Other Category"
                                                            name="categoryname" class=" form-control">
                                                    </div>
                                                    @if ($errors->has('category'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('category') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @if (!Auth::user()->hasRole('Influencer'))
                                            <div class="col-md-6 pb-1">
                                                <div class="row">
                                                    <div class="col-md-4"><label>Year of Establish:</label></div>
                                                    <div class="col-md-7">
                                                        <input type="text" class=" form-control" id="year"
                                                            name="year" value="{{ $users->year }}">
                                                        @if ($errors->has('year'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('year') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @role('Influencer')
                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Date of Birth:</label></div>
                                                    <div class="col-md-7">
                                                        {{-- <input type="date" class=" form-control" name="dob"
                                                    value="{{ $influencer->dob }}" id="dob"> --}}

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 pb-1">

                                                <div class="col-md-4 pb-1">
                                                    <label>Influencer Category:</label>
                                                </div>
                                                <div class="col-md-7 pb-1">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <select class="form-control select2_1 " style="width:95%"
                                                                name="categoryId[]" multiple="multiple">
                                                                <option disabled>-- Select Influencer Category --</option>
                                                                {{-- @foreach ($influencerCategory as $category)
                                                            <option value="{{ $category->name }}"
                                                                {{ old('categoryId', $influencer->categoryId) == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach --}}
                                                            </select>
                                                            <b id="influencerCategory"></b>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Gender:</label></div>
                                                    <div class="col-md-7">
                                                        {{-- <label>
                                                    <input type="radio" name="gender" value="Male" id="gender"
                                                        {{ old('gender') == 'Male' || $influencer->gender == 'Male' ? 'checked' : '' }}>
                                                    Male
                                                </label> --}}

                                                        {{-- <label>
                                                    <input type="radio" name="gender" value="Female" id="gender"
                                                        {{ old('gender') == 'Female' || $influencer->gender == 'Female' ? 'checked' : '' }}>
                                                    Female
                                                </label> --}}

                                                    </div>
                                                </div>
                                            </div>
                                        @endrole

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pb-1">
                                            <div class="row">
                                                <div class="col-md-2"><label>About:</label></div>
                                                <div class="col-md-10">
                                                    <textarea style="width:95%" class="about form-control" rows="5" placeholder="Enter About" type="text"
                                                        id="about" name="about" value="">{{ $users->about }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @role('Influencer')
                                        <div class="row">
                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Instagram Username or Link:</label></div>
                                                    <div class="col-md-7">
                                                        {{-- <input type="text" class=" form-control" name="instagramUrl"
                                                    value="{{ $influencer->instagramUrl }}"
                                                    placeholder="username or @your_username" id="instagramUrl">
                                                @if ($errors->has('instagramUrl'))
                                                    <span class="text-danger">{{ $errors->first('instagramUrl') }}</span>
                                                @endif --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    {{-- <div class="col-md-4"><label>Instagram Followers:</label></div>
                                            <div class="col-md-7">
                                                <input type="text" class=" form-control" name="instagramFollowers"
                                                    value="{{ $influencer->instagramFollowers }}"
                                                    placeholder="Enter your instagram followers" id="instagramUrl">
                                            </div> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Youtube Channel Url:</label></div>
                                                    <div class="col-md-7">
                                                        {{-- <input type="text" class=" form-control" name="youtubeChannelUrl"
                                                    value="{{ $influencer->youtubeChannelUrl }}"
                                                    placeholder="Enter your youtube channel" id="youtubeChannelUrl"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Youtube Subscriber:</label></div>
                                                    <div class="col-md-7">
                                                        {{-- <input type="text" class=" form-control" name="youtubeSubscriber"
                                                    value="{{ $influencer->youtubeSubscriber }}"
                                                    placeholder="Enter your youtube subscriber" id="youtubeSubscriber"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endrole
                                    @role('Brand')
                                        <div class="row">
                                            <div class="col-md-2 pb-1">
                                                <label>Brand Category:</label>
                                            </div>
                                            <div class="col-md-10 pb-1">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <select class="form-control " name="brandCategoryId">
                                                            <option disabled selected>-- Select Brand Category --</option>
                                                            @foreach ($brandCategory as $bcategory)
                                                                @if (isset($brand_category->brandCategoryId))
                                                                    <option value="{{ $bcategory->id }}"
                                                                        {{ old('brandCategoryId', $brand_category->brandCategoryId) == $bcategory->id ? 'selected' : '' }}>
                                                                        {{ $bcategory->categoryName }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $bcategory->id }}">
                                                                        {{ $bcategory->categoryName }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endrole
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-sm">Update</button><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-links" role="tabpanel"
                        aria-labelledby="v-pills-links-tab">
                        <form action="{{ route('link.update') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label> <i class="fa fa-phone ico text-success"></i>
                                                Phone
                                                Number:</label></div>
                                        <div class="col-md-7">
                                            {{-- <input type="number" class="form-control " id="phone1" name="phone1"
                                                value="{{ $links->phone1 }}"> --}}
                                            @if ($errors->has('phone1'))
                                                <span class="text-danger">{{ $errors->first('phone1') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label> <i class="fa fa-whatsapp ico text-success"></i>
                                                Whatsapp Number:</label></div>
                                        <div class="col-md-7">
                                            {{-- <input type="number" class="form-control " id="whatsappnumber"
                                                name="whatsappnumber" value="{{ $links->phone2 }}"> --}}
                                            @if ($errors->has('whatsappnumber'))
                                                <span
                                                    class="text-danger">{{ $errors->first('whatsappnumber') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label> <i class="fa fa-envelope ico"></i>
                                                Email:</label>
                                        </div>
                                        <div class="col-md-7">
                                            {{-- <input type="email" class="form-control " id="email" name="email"
                                                value="{{ $links->email }}"> --}}
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label> <i class="fa fa-skype ico text-info"></i>
                                                Skype:</label></div>
                                        <div class="col-md-7">
                                            {{-- <input type="text" class="form-control " id="skype" name="skype"
                                                value="{{ $links->skype }}"> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label> <i class="fa fa-facebook ico text-primary"></i>
                                                FaceBook:</label></div>
                                        <div class="col-md-7">
                                            {{-- <input type="text" class="form-control " id="facebook" name="facebook"
                                                value="{{ $links->facebook }}"> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label> <i class="fa fa-instagram ico"
                                                    style="color: #E1306C;"></i> Instagram:</label></div>
                                        <div class="col-md-7">
                                            {{-- <input type="text" class="form-control " id="instagram" name="instagram"
                                                value="{{ $links->instagram }}"> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label> <i class="fa fa-twitter ico text-info"></i>
                                                Twitter:</label></div>
                                        <div class="col-md-7">
                                            {{-- <input type="text" class="form-control " id="" name="twitter"
                                                value="{{ $links->twitter }}"> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label> <i class="fa fa-youtube ico text-danger"></i>
                                                Youtube:</label></div>
                                        <div class="col-md-7">
                                            {{-- <input type="text" class="form-control " id="" name="youtube"
                                                value="{{ $links->youtube }}"> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label> <i class="fa fa-linkedin ico text-primary"></i>
                                                Linkedin:</label></div>
                                        <div class="col-md-7">
                                            {{-- <input type="text" class="form-control " id="" name="linkedin"
                                                value="{{ $links->linkedin }}"> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label> <i class="fa fa-globe ico text-secondary"></i>
                                                Web
                                                Site:</label></div>
                                        <div class="col-md-7">
                                            {{-- <input type="text" class="form-control " id="" name="website"
                                                value="{{ $links->website }}"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center pt-2">
                                <button type="submit" class="btn btn-success ">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-Payment" role="tabpanel"
                        aria-labelledby="v-pills-Payment-tab">
                        <form class="form" method="post" action="{{ route('payment.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <label for="formFile" class="form-label ">Bank Name</label>
                            <input class="form-control " type="text" id="bankName" value=""
                                name="bankName">
                            <br>
                            <label for="formFile" class="form-label ">Account Holder Name</label>
                            {{-- <input class="form-control " type="text" id="accountHolderName"
                                    value="{{ $payment->accountHolderName }}" name="accountHolderName"> --}}
                            @if ($errors->has('accountHolderName'))
                                <span class="text-danger">{{ $errors->first('accountHolderName') }}</span>
                            @endif
                            <br>
                            <label for="formFile" class=" form-label">Account Number</label>
                            {{-- <input class="form-control " type="text" id="accountNumber" name="accountNumber"
                                    value="{{ $payment->accountNumber }}"> --}}
                            @if ($errors->has('accountNumber'))
                                <span class="text-danger">{{ $errors->first('accountNumber') }}</span>
                            @endif
                            <br>
                            <label for="formFile" class=" form-label">Account Type</label>
                            {{-- <input class="form-control " type="text" id="accountType" name="accountType"
                                    value="{{ $payment->accountType }}"> --}}
                            <br>
                            <label for="formFile" class=" form-label">IFSC Code</label>
                            {{-- <input class="form-control " type="text" id="ifscCode" name="ifscCode"
                                    value="{{ $payment->ifscCode }}"> --}}
                            @if ($errors->has('ifscCode'))
                                <span class="text-danger">{{ $errors->first('ifscCode') }}</span>
                            @endif
                            <br>
                            <label for="formFile" class=" form-label">Upi Id</label>
                            {{-- <input class="form-control " type="text" id="upidetail" name="upidetail"
                                    value="{{ $payment->upidetail }}"><br> --}}
                            <div class="text-center">
                                <button class="btn btn-sm btn-success" type="submit">Submit</button>
                            </div>

                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-service" role="tabpanel"
                        aria-labelledby="v-pills-service-tab">
                        <form class="form" method="post" action="{{ route('servicedetail.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">

                                <label for="formFile" class="form-label ">Title</label>
                                <input class="form-control " type="text" id="title" name="title"><br>

                                <label for="formFile" class="form-label ">Photo</label>
                                <input type="file" class="" accept="image/*" id="photo"
                                    name="photo"><br>

                                <label for="formFile" class="form-label ">Description</label><br>
                                <textarea name="description" class="form-control" id="description" cols="10" rows="5"></textarea>

                                <div class="text-center pt-2">
                                    <button type="submit"class="btn btn-sm btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                        <div class="border-top">
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Photo</th>
                                            <th>Description</th>
                                            <th width="150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($servicedetail as $servicedetails)
                                            <tr>
                                                <td>{{ $servicedetails->title }}</td>
                                                <td><img src="{{ url('servicedetailimg') }}/{{ $servicedetails->photo }}"
                                                        class="img-thumbnail" style="width:100px;height:100px"></td>
                                                <td>{{ $servicedetails->description }}</td>
                                                <td><a href="{{ route('servicedetail.edit') }}/{{ $servicedetails->id }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <a onclick="return confirm('Are you sure?')"
                                                        href="{{ route('servicedetail.delete') }}/{{ $servicedetails->id }}"
                                                        class="btn btn-sm bg-danger text-white">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-qr" role="tabpanel" aria-labelledby="v-pills-qr-tab">
                        <form class="form" method="post" action="{{ route('qrcode.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="qrcardId" id="cardId" value="{{ request('id') }}">

                            <label for="formFile" class="form-label ">Type</label>
                            <input class="form-control  w-100" type="text" id="type" name="type"><br>
                            @if ($errors->has('type'))
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif

                            <label for="formFile" class="form-label ">Phone Number</label>
                            <input class="form-control " type="number" id="number" name="number"><br>
                            @if ($errors->has('number'))
                                <span class="text-danger">{{ $errors->first('number') }}</span>
                            @endif

                            <label for="formFile" class="form-label ">QR Code</label>
                            <input type="file" id="code" class="pb-3 " name="code"><br>
                            @if ($errors->has('code'))
                                <span class="text-danger">{{ $errors->first('code') }}</span>
                            @endif
                            <div class="text-center">
                                <button class="btn btn-sm btn-success my-3" type="submit">Submit</button>
                            </div>
                        </form>

                        <div class="border-top">
                            <div class=" row">
                                {{-- @foreach ($qr as $qr)
                                    <div class="col-md-3 py-3">

                                        <p>
                                            <span class=" ">Title</span>: {{ $qr->type }}
                                        </p>

                                        <a class="text-danger" data-bs-toggle="modal" data-id="{{ $qr->id }}"
                                            data-bs-target="#Editservicedetails">
                                            <!-- <i class="bi bi-pencil-square "></i> -->
                                        </a>
                                        <img src="{{ url('QRcodes') }}/{{ $qr->code }}" class="img-thumbnail"
                                            style="width:100px;height:100px">
                                        <br>
                                        <p><strong class="">Number</strong>: {{ $qr->number }}</p>
                                        <a class="" onclick="return confirm('Are you sure?')"
                                            href="{{ Route('qr.delete') }}/{{ $qr->id }}"><i
                                                class="fa fa-trash ico text-danger text-center"></i></a>
                                    </div>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-Slider" role="tabpanel"
                        aria-labelledby="v-pills-Slider-tab">
                        <form class="form" method="post" action="{{ route('sliders') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="sliderCardId" value="{{ $users->id }}">
                                <label for="formFile" class=" form-label">File :</label>
                                <input type="file" class=" py-1" name="file">

                                <button type="submit" class="btn btn-sm btn-success my-2" id="submitimage"
                                    name="submitimage">Upload</button>
                            </div>
                        </form>


                        <div class="row">
                            {{-- @foreach ($slider as $slider)
                                <div class="col-md-3 py-3">


                                    <img src="{{ url('slider') }}/{{ $slider->file }}" class="img-thumbnail"
                                        style="width:100px;height:100px">
                                    <br>

                                    <a class="" onclick="return confirm('Are you sure?')"
                                        href="{{ route('slider.delete') }}/{{ $slider->id }}"><i
                                            class="bi bi-trash ico text-danger text-center"></i></a>
                                </div>
                            @endforeach --}}
                        </div>
                    </div>
                    <div class="tab-pane fade " id="v-pills-Brochure" role="tabpanel"
                        aria-labelledby="v-pills-Brochure-tab">
                        <form class="form" method="post" action="{{ route('bro.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="cardid" value="{{ $users->id }}">
                                <label for="formFile" class=" form-label">File :</label>
                                <input type="file" class=" py-1" name="brochure">

                                <button type="submit" class="btn btn-sm btn-success my-2" id="submitimage"
                                    name="submitimage">Upload</button>
                            </div>
                        </form>


                        <div class="row">
                            {{-- @foreach ($bro as $bro)
                                <div class="col-md-3">
                                    <h5><a href="{{ url('brofile/' . $bro->file) }}" class="text-primary"
                                            target="_blank"> Brochure</a> <a class=""
                                            onclick="return confirm('Are you sure?')"
                                            href="{{ Route('bro.delete') }}/{{ $bro->id }}"><i
                                                class="fa fa-trash ico text-danger text-center"></i></a></h5>
                                </div>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
