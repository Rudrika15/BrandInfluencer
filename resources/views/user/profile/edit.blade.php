<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profle</title>
    <link rel="stylesheet" href="{{ asset('influencerbrand/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <style>
        .select2-container {
            width: 100% !important;
            /* Adjust width as needed */
        }



        .select2-dropdown {
            width: auto !important;
            /* Ensure dropdown width is auto-adjusting */
            min-width: 65%;
            /* Ensure dropdown does not overflow container */
            margin-left: 0.8%;
            box-sizing: border-box;
            /* Include padding and border in element's total width and height */
        }

        .nav-pills .nav-link {
            border-radius: 0px;
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



    <div class="container-fluid p-5" style=" background: #e9e9e9;">

        <div class="pb-2">
            <a href="{{ route('profile') }}" class="btn btn-light">
                < Back</a>
        </div>
        <div class="row">

            <div class="col-3">
                <div class="card h-100 w-100 ">
                    <div class="card-body">
                        <div class="nav flex-column nav-pills mt-2" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active " id="v-pills-profile-tab" data-bs-toggle="pill"
                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                aria-selected="true">Profile</a>
                            <a class="nav-link mt-2" id="v-pills-links-tab" data-bs-toggle="pill" href="#v-pills-links"
                                role="tab" aria-controls="v-pills-links" aria-selected="false"> Social Links</a>
                            <a class="nav-link mt-2" id="v-pills-categories-tab" data-bs-toggle="pill"
                                href="#v-pills-categories" role="tab" aria-controls="v-pills-categories"
                                aria-selected="false"> Categories</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 ">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active " id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <div class="card w-100" style="height: 500px !important;">
                            <div class="card-body">
                                <form action="{{ route('card.store') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 pb-1">
                                            {{-- <input type="hidden" name="cardid" value="{{ $users->id }}"> --}}

                                            <div class="row">
                                                <div class="col-md-4"><label>Your Full Name:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control shadow-none "
                                                        id="name" name="name" value="{{ $users->name }}">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label>Username:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class=" form-control shadow-none"
                                                        id="username" name="username" value="{{ $users->username }}">
                                                </div>
                                            </div>
                                        </div>
                                        @if (!Auth::user()->hasRole('Influencer'))
                                            <div class="col-md-6 pb-1">
                                                <div class="row">
                                                    <div class="col-md-4"><label>State:</label></div>
                                                    <div class="col-md-7">
                                                        <input type="text" class=" form-control shadow-none"
                                                            id="state" name="state" value="{{ $users->state }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label>City:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control shadow-none "
                                                        id="location" name="city" value="{{ $users->city }}">
                                                </div>
                                            </div>
                                        </div>
                                        @if (!Auth::user()->hasRole('Influencer'))
                                            <div class="col-md-6 pb-1">
                                                <div class="row">
                                                    <div class="col-md-4"><label>Address:</label></div>
                                                    <div class="col-md-7">
                                                        <textarea type="text" class="form-control shadow-none " id="address" name="address">{{ $users->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label>Profile Photo:</label></div>
                                                <div class="col-md-5">
                                                    <input type="file" accept="image/*"
                                                        class="form-control shadow-none " id="profilePhoto"
                                                        name="profilePhoto"
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




                                        @role('Influencer')
                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Date of Birth:</label></div>
                                                    <div class="col-md-7">
                                                        <input type="date" class=" form-control shadow-none"
                                                            name="dob">
                                                        {{-- value="{{ $influencer->dob }}" id="dob"> --}}

                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Gender:</label></div>
                                                    <div class="col-md-7">
                                                        <label>
                                                            <input type="radio" name="gender" value="Male"
                                                                id="gender">
                                                            {{-- {{ old('gender') == 'Male' || $influencer->gender == 'Male' ? 'checked' : '' }}> --}}
                                                            Male
                                                        </label>

                                                        <label>
                                                            <input type="radio" name="gender" value="Female"
                                                                id="gender">
                                                            {{-- {{ old('gender') == 'Female' || $influencer->gender == 'Female' ? 'checked' : '' }}> --}}
                                                            Female
                                                        </label>

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
                                                    <textarea style="width:95%" class="about form-control shadow-none" rows="5" placeholder="Enter About"
                                                        type="text" id="about" name="about" value="">{{ $users->about }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-5">Update</button><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-links" role="tabpanel"
                        aria-labelledby="v-pills-links-tab">
                        <div class="card w-100 " style="height: 500px !important;">
                            <div class="card-body">
                                <form action="{{ route('link.update') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label> <i
                                                            class="fa fa-phone ico text-success"></i>
                                                        Phone
                                                        Number:</label></div>
                                                <div class="col-md-7">
                                                    <input type="number" class="form-control shadow-none "
                                                        id="phone1" name="phone1">
                                                    {{-- value="{{ $links->phone1 }}"> --}}
                                                    @if ($errors->has('phone1'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('phone1') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label> <i
                                                            class="fab fa-whatsapp ico text-success"></i>
                                                        Whatsapp Number:</label></div>
                                                <div class="col-md-7">
                                                    <input type="number" class="form-control shadow-none "
                                                        id="whatsappnumber" name="whatsappnumber">
                                                    {{-- value="{{ $links->phone2 }}"> --}}
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
                                                    <input type="email" class="form-control shadow-none "
                                                        id="email" name="email">
                                                    {{-- value="{{ $links->email }}"> --}}
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label> <i
                                                            class="fab fa-skype ico text-info"></i>
                                                        Skype:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control shadow-none "
                                                        id="skype" name="skype">
                                                    {{-- value="{{ $links->skype }}"> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label> <i
                                                            class="fab fa-facebook ico text-primary"></i>
                                                        FaceBook:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control shadow-none "
                                                        id="facebook" name="facebook">
                                                    {{-- value="{{ $links->facebook }}"> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label> <i class="fab fa-instagram icon"
                                                            style="color: #E1306C;"></i> Instagram:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control shadow-none "
                                                        id="instagram" name="instagram">
                                                    {{-- value="{{ $links->instagram }}"> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label> <i
                                                            class="fab fa-twitter ico text-info"></i>
                                                        Twitter:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control shadow-none "
                                                        id="" name="twitter" {{-- value="{{ $links->twitter }}"> --}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label> <i
                                                            class="fab fa-youtube ico text-danger"></i>
                                                        Youtube:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control shadow-none "
                                                        id="" name="youtube" {{-- value="{{ $links->youtube }}"> --}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label> <i
                                                            class="fab fa-linkedin-in ico text-primary"></i>
                                                        Linkedin:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control shadow-none "
                                                        id="" name="linkedin" {{-- value="{{ $links->linkedin }}"> --}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pb-1">
                                            <div class="row">
                                                <div class="col-md-4"><label> <i
                                                            class="fa fa-globe ico text-secondary"></i>
                                                        Web
                                                        Site:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control shadow-none"
                                                        id="" name="website" {{-- value="{{ $links->website }}"> --}}>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @role('Influencer')
                                        <div class="row mt-2">
                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        {{-- <i class="fa fa-link"></i> --}}
                                                        <label>Instagram
                                                            Username or Link:</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text" class=" form-control shadow-none "
                                                            name="instagramUrl" {{-- value="{{ $influencer->instagramUrl }}" --}}
                                                            placeholder="username or @your_username" id="instagramUrl">
                                                        @if ($errors->has('instagramUrl'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('instagramUrl') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Instagram Followers:</label></div>
                                                    <div class="col-md-7">
                                                        <input type="text" class=" form-control shadow-none"
                                                            name="instagramFollowers" {{-- value="{{ $influencer->instagramFollowers }}" --}}
                                                            placeholder="Enter your instagram followers"
                                                            id="instagramUrl">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Youtube Channel Url:</label></div>
                                                    <div class="col-md-7">
                                                        <input type="text" class=" form-control shadow-none"
                                                            name="youtubeChannelUrl" {{-- value="{{ $influencer->youtubeChannelUrl }}" --}}
                                                            placeholder="Enter your youtube channel"
                                                            id="youtubeChannelUrl">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pb-1">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Youtube Subscriber:</label></div>
                                                    <div class="col-md-7">
                                                        <input type="text" class=" form-control shadow-none"
                                                            name="youtubeSubscriber" {{-- value="{{ $influencer->youtubeSubscriber }}" --}}
                                                            placeholder="Enter your youtube subscriber"
                                                            id="youtubeSubscriber">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endrole
                                    <div class="text-center pt-5 ">
                                        <button type="submit" class="btn btn-primary ">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-categories" role="tabpanel"
                        aria-labelledby="v-pills-categories-tab">
                        <div class="card w-100 " style="height: 500px !important;">
                            <div class="card-body">
                                @role('Influencer')
                                    <div class="row ">
                                        <select name="categories[]" class="form-select shadow-none" id="categories"
                                            multiple>
                                            <option disabled> --Select Categories-- </option>
                                            @foreach ($influencerCategory as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endrole
                                @role('Brand')
                                    <div class="row">
                                        <div class="col-md-2 pb-1">
                                            <label>Brand Category:</label>
                                        </div>
                                        <select class="form-control shadow-none" name="brandCategoryId" id="categories"
                                            multiple>
                                            <option disabled>-- Select Brand Category --</option>
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

                                @endrole
                                <div class="justify-content-center d-flex mt-4">
                                    <button class="btn btn-primary text-center">Select</button>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categories').select2({
                placeholder: '-- Select Category --',
                allowClear: true,
                width: '100%'
            });

        });
    </script>

</body>


</html>
