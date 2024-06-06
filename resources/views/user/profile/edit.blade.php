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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



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
            background-color: #00c9e4;
        }

        .nav-link {
            color: #1d4880;
            border: none !important;
            border-radius: 30px !important;
        }

        .btn-primary {
            background-color: #1d4880 !important;
            border: none !important;
        }

        /* file upload*/


        :root {
            --clr-white: rgb(255, 255, 255);
            --clr-black: rgb(0, 0, 0);
            --clr-light: rgb(245, 248, 255);
            --clr-light-gray: rgb(196, 195, 196);
            --clr-blue: rgb(63, 134, 255);
            --clr-light-blue: rgb(167, 219, 247);
        }

        /* Upload Area */
        .upload-area {
            width: 100%;
            max-width: 25rem;
            background-color: var(--clr-white);
            box-shadow: 0 10px 60px rgb(218, 229, 255);
            border: 2px solid var(--clr-light-blue);
            border-radius: 24px;
            padding: 2rem 1.875rem 2rem 1.875rem;
            margin: 0.625rem;
            margin-left: 300px;
            text-align: center;
        }

        .upload-area--open {
            /* Slid Down Animation */
            animation: slidDown 500ms ease-in-out;
        }

        @keyframes slidDown {
            from {
                height: 28.125rem;
                /* 450px */
            }

            to {
                height: 35rem;
                /* 560px */
            }
        }

        /* Header */
        .upload-area__header {}

        .upload-area__title {
            font-size: 1.8rem;
            font-weight: 500;
            margin-bottom: 0.3125rem;
        }

        .upload-area__paragraph {
            font-size: 0.9375rem;
            color: var(--clr-light-gray);
            margin-top: 0;
        }

        .upload-area__tooltip {
            position: relative;
            color: var(--clr-light-blue);
            cursor: pointer;
            transition: color 300ms ease-in-out;
        }

        .upload-area__tooltip:hover {
            color: var(--clr-blue);
        }

        .upload-area__tooltip-data {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -125%);
            min-width: max-content;
            background-color: var(--clr-white);
            color: var(--clr-blue);
            border: 1px solid var(--clr-light-blue);
            padding: 0.625rem 1.25rem;
            font-weight: 500;
            opacity: 0;
            visibility: hidden;
            transition: none 300ms ease-in-out;
            transition-property: opacity, visibility;
        }

        .upload-area__tooltip:hover .upload-area__tooltip-data {
            opacity: 1;
            visibility: visible;
        }

        /* Drop Zoon */
        .upload-area__drop-zoon {
            position: relative;
            height: 11.25rem;
            /* 180px */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border: 2px dashed var(--clr-light-blue);
            border-radius: 15px;
            margin-top: 2.1875rem;
            cursor: pointer;
            transition: border-color 300ms ease-in-out;
        }

        .upload-area__drop-zoon:hover {
            border-color: var(--clr-blue);
        }

        .drop-zoon__icon {
            display: flex;
            font-size: 3.75rem;
            color: var(--clr-blue);
            transition: opacity 300ms ease-in-out;
        }

        .drop-zoon__paragraph {
            font-size: 0.9375rem;
            color: var(--clr-light-gray);
            margin: 0;
            margin-top: 0.625rem;
            transition: opacity 300ms ease-in-out;
        }

        .drop-zoon:hover .drop-zoon__icon,
        .drop-zoon:hover .drop-zoon__paragraph {
            opacity: 0.7;
        }

        .drop-zoon__loading-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            color: var(--clr-light-blue);
            z-index: 10;
        }

        .drop-zoon__preview-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 0.3125rem;
            border-radius: 10px;
            display: none;
            z-index: 1000;
            transition: opacity 300ms ease-in-out;
        }

        .drop-zoon:hover .drop-zoon__preview-image {
            opacity: 0.8;
        }

        .drop-zoon__file-input {
            display: none;
        }

        /* (drop-zoon--over) Modifier Class */
        .drop-zoon--over {
            border-color: var(--clr-blue);
        }

        .drop-zoon--over .drop-zoon__icon,
        .drop-zoon--over .drop-zoon__paragraph {
            opacity: 0.7;
        }

        /* (drop-zoon--over) Modifier Class */
        .drop-zoon--Uploaded {}

        .drop-zoon--Uploaded .drop-zoon__icon,
        .drop-zoon--Uploaded .drop-zoon__paragraph {
            display: none;
        }

        /* File Details Area */
        .upload-area__file-details {
            height: 0;
            visibility: hidden;
            opacity: 0;
            text-align: left;
            transition: none 500ms ease-in-out;
            transition-property: opacity, visibility;
            transition-delay: 500ms;
        }

        /* (duploaded-file--open) Modifier Class */
        .file-details--open {
            height: auto;
            visibility: visible;
            opacity: 1;
        }

        .file-details__title {
            font-size: 1.125rem;
            font-weight: 500;
            color: var(--clr-light-gray);
        }

        /* Uploaded File */
        .uploaded-file {
            display: flex;
            align-items: center;
            padding: 0.625rem 0;
            visibility: hidden;
            opacity: 0;
            transition: none 500ms ease-in-out;
            transition-property: visibility, opacity;
        }

        /* (duploaded-file--open) Modifier Class */
        .uploaded-file--open {
            visibility: visible;
            opacity: 1;
        }

        .uploaded-file__icon-container {
            position: relative;
            margin-right: 0.3125rem;
        }

        .uploaded-file__icon {
            font-size: 3.4375rem;
            color: var(--clr-blue);
        }

        .uploaded-file__icon-text {
            position: absolute;
            top: 1.5625rem;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.9375rem;
            font-weight: 500;
            color: var(--clr-white);
        }

        .uploaded-file__info {
            position: relative;
            top: -0.3125rem;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .uploaded-file__info::before,
        .uploaded-file__info::after {
            content: '';
            position: absolute;
            bottom: -0.9375rem;
            width: 0;
            height: 0.5rem;
            background-color: #ebf2ff;
            border-radius: 0.625rem;
        }

        .uploaded-file__info::before {
            width: 100%;
        }

        .uploaded-file__info::after {
            width: 100%;
            background-color: var(--clr-blue);
        }

        /* Progress Animation */
        .uploaded-file__info--active::after {
            animation: progressMove 800ms ease-in-out;
            animation-delay: 300ms;
        }

        @keyframes progressMove {
            from {
                width: 0%;
                background-color: transparent;
            }

            to {
                width: 100%;
                background-color: var(--clr-blue);
            }
        }

        .uploaded-file__name {
            width: 100%;
            max-width: 6.25rem;
            /* 100px */
            display: inline-block;
            font-size: 1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .uploaded-file__counter {
            font-size: 1rem;
            color: var(--clr-light-gray);
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
        <div class="row">

            <div class="col pb-2">
                <a href="{{ route('profile') }}" class="btn btn-light">
                    < Back</a>
            </div>
            <div class="col d-flex justify-content-end">

                @if (session()->has('success'))
                    <div class="toast align-items-center text-white show bg-success" role="alert"
                        aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{ session('success') }}
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-light"
                                role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="toast align-items-center text-white show bg-danger" role="alert" aria-live="assertive"
                        aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{ session('error') }}
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-light"
                                role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>
                @endif
                @if (session()->has('warning'))
                    <div class="toast align-items-center text-white show bg-warning" role="alert"
                        aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{ session('warning') }}
                            </div>
                            {{-- <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button> --}}
                        </div>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark"
                                role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>
                @endif
            </div>
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
                            <a class="nav-link mt-2" id="v-pills-categories-tab" data-bs-toggle="pill"
                                href="#v-pills-categories" role="tab" aria-controls="v-pills-categories"
                                aria-selected="false"> Categories</a>

                            @role('Influencer')
                                <a class="nav-link mt-2" id="v-pills-links-tab" data-bs-toggle="pill"
                                    href="#v-pills-links" role="tab" aria-controls="v-pills-links"
                                    aria-selected="false"> Portfolio</a>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 ">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active " id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <div class="card w-100">
                            <div class="card-body">
                                <form action="{{ route('card.store') }}" enctype="multipart/form-data"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 pb-2">
                                            {{-- <input type="hidden" name="cardid" value="{{ $users->id }}"> --}}

                                            <div class="row">
                                                <div class="col-md-4"><label>Your Full Name:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control shadow-none "
                                                        id="name" name="name"
                                                        value="{{ $users->name ?? '-' }}">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pb-2">
                                            <div class="row">
                                                <div class="col-md-4"><label>Username:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class=" form-control shadow-none"
                                                        id="username" name="username"
                                                        value="{{ $users->username ?? '-' }}">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @if (Auth::user()->hasRole('Influencer')) --}}
                                        <div class="col-md-6 pb-2">
                                            <div class="row">
                                                <div class="col-md-4"><label>State:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class=" form-control shadow-none"
                                                        id="state" name="state"
                                                        value="{{ $users->state ?? '-' }}">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @endif --}}

                                        <div class="col-md-6 pb-2 ">
                                            <div class="row ">
                                                <div class="col-md-4"><label>City:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control shadow-none "
                                                        id="location" name="city"
                                                        value="{{ $users->city ?? '-' }}">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @if (!Auth::user()->hasRole('Influencer'))
                                            <div class="col-md-6 pb-2">
                                                <div class="row">
                                                    <div class="col-md-4"><label>Address:</label></div>
                                                    <div class="col-md-7">
                                                        <textarea type="text" class="form-control shadow-none " id="address" name="address">{{ $users->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif --}}
                                        @role('Influencer')
                                            <div class="col-md-6 pb-2">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Date of Birth:</label></div>
                                                    <div class="col-md-7">
                                                        <input type="date" class=" form-control shadow-none"
                                                            name="dob" value="{{ $influencer->dob }}"
                                                            id="dob">

                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-6 pb-2">
                                                <div class="row">

                                                    <div class="col-md-4"><label>Gender:</label></div>
                                                    <div class="col-md-7">
                                                        <label>
                                                            <input type="radio" name="gender" value="Male"
                                                                id="gender"
                                                                {{ old('gender') == 'Male' || $influencer->gender == 'Male' ? 'checked' : '' }}>
                                                            Male
                                                        </label>

                                                        <label>
                                                            <input type="radio" name="gender" value="Female"
                                                                id="gender"
                                                                {{ old('gender') == 'Female' || $influencer->gender == 'Female' ? 'checked' : '' }}>
                                                            Female
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        @endrole

                                        <div class="col-md-6 pb-2">
                                            <div class="row">

                                                <div class="col-md-4"><label>Instagram Url:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class=" form-control shadow-none"
                                                        name="instagramUrl" value="{{ $influencer->instagramUrl }}"
                                                        id="instagramUrl">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pb-2">
                                            <div class="row">

                                                <div class="col-md-4"><label>Instagram Followers:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class=" form-control shadow-none"
                                                        name="instagramFollowers"
                                                        value="{{ $influencer->instagramFollowers }}"
                                                        id="instagramFollowers">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pb-2">
                                            <div class="row">

                                                <div class="col-md-4"><label>Youteube Channel Url:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class=" form-control shadow-none"
                                                        name="youtubeChannelUrl"
                                                        value="{{ $influencer->youtubeChannelUrl }}"
                                                        id="youtubeChannelUrl">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pb-2">
                                            <div class="row">

                                                <div class="col-md-4"><label>Youteube Subscribers:</label></div>
                                                <div class="col-md-7">
                                                    <input type="text" class=" form-control shadow-none"
                                                        name="youtubeSubscriber"
                                                        value="{{ $influencer->youtubeSubscriber }}"
                                                        id="youtubeSubscriber">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pb-2">
                                            <div class="row">
                                                <div class="col-md-4"><label>Profile Photo:</label></div>
                                                <div class="col-md-5">
                                                    <input type="file" accept="image/*"
                                                        class="form-control shadow-none " id="profilePhoto"
                                                        name="profilePhoto"
                                                        value="{{ url('profile') }}/{{ $users->profilePhoto ?? '-' }}">
                                                    @if ($errors->has('profilePhoto'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('profilePhoto') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{ url('profile') }}/{{ $users->profilePhoto ?? '-' }}"
                                                        class="img-fluid" alt="Responsive image">
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 pb-2 mt-1">
                                            <div class="row">
                                                <div class="col-md-2"><label>About:</label></div>
                                                <div class="col-md-10">
                                                    <textarea style="width:95%" class="about form-control shadow-none" rows="5" placeholder="Enter About"
                                                        type="text" id="about" name="about" value="">{{ $users->about ?? '-' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-3">Update</button><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-links" role="tabpanel"
                        aria-labelledby="v-pills-links-tab">
                        <div class="card w-100 " style="height: 580px !important;">
                            <div class="card-body">
                                <form action="{{ route('influencer.portfolio.storeOrupdate') }}"
                                    enctype="multipart/form-data" method="post">
                                    @csrf

                                    <div id="uploadArea" class="upload-area">
                                        <!-- Header -->
                                        <div class="upload-area__header">
                                            <h1 class="upload-area__title">Upload your file</h1>
                                            <p class="upload-area__paragraph">
                                                File should be an image
                                                <strong class="upload-area__tooltip">
                                                    Like
                                                    <span class="upload-area__tooltip-data"></span>
                                                    <!-- Data Will be Comes From Js -->
                                                </strong>
                                            </p>
                                        </div>
                                        <!-- End Header -->

                                        <!-- Drop Zoon -->
                                        <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
                                            <span class="drop-zoon__icon">
                                                <i class='bx bxs-file-image'></i>
                                            </span>
                                            <p class="drop-zoon__paragraph">Drop your file here or Click to browse</p>
                                            <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
                                            <img src="" alt="Preview Image" id="previewImage"
                                                class="drop-zoon__preview-image" draggable="false">
                                            <input type="file" id="fileInput" name="photo"
                                                class="drop-zoon__file-input" accept="image/*">
                                        </div>
                                        <!-- End Drop Zoon -->

                                        <!-- File Details -->
                                        <div id="fileDetails" class="upload-area__file-details file-details">
                                            <h3 class="file-details__title">Uploaded File</h3>

                                            <div id="uploadedFile" class="uploaded-file">
                                                <div class="uploaded-file__icon-container">
                                                    <i class='bi bi-file-earmark-image uploaded-file__icon'></i>
                                                    <span class="uploaded-file__icon-text"></span>
                                                    <!-- Data Will be Comes From Js -->
                                                </div>

                                                <div id="uploadedFileInfo" class="uploaded-file__info">
                                                    <span class="uploaded-file__name">Proejct 1</span>
                                                    <span class="uploaded-file__counter">0%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End File Details -->
                                    </div>

                                    <div class="text-center pt-2 ">
                                        <button type="submit" class="btn btn-primary ">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-categories" role="tabpanel"
                        aria-labelledby="v-pills-categories-tab">
                        <div class="card w-100" style="height: 500px !important;">
                            <div class="card-body mt-5">
                                <form action="{{ route('category.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                    @role('Influencer')
                                        <div class="row">
                                            <div class="col-md-12 pb-2">
                                                <label>Influencer Category:</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select name="categories[]" class="form-select shadow-none"
                                                    id="categories" multiple>
                                                    <option disabled>--Select Categories--</option>
                                                    @foreach ($influencerCategory as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if (in_array($item->id, json_decode($influencer->categoryId, true))) selected @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endrole
                                    {{-- {{ $brandCategory }} --}}
                                    @role('Brand')
                                        <div class="row">
                                            <div class="col-md-12 pb-2">
                                                <label>Brand Category:</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select class="form-control shadow-none" name="brandCategoryId[]"
                                                    id="categories" multiple>
                                                    <option disabled>-- Select Brand Category --</option>
                                                    @foreach ($brandCategory as $bcategory)
                                                        <option value="{{ $bcategory->id }}"
                                                            @if ($brand_category->contains('brandCategoryId', $bcategory->id)) selected @endif>
                                                            {{ $bcategory->categoryName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    @endrole
                                    <div class="justify-content-center d-flex mt-4">
                                        <button type="submit" class="btn btn-primary text-center">Update</button>
                                    </div>

                                </form>
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
        document.addEventListener('DOMContentLoaded', function() {
            const toasts = document.querySelectorAll('.toast');

            function startProgressBar(toast) {
                const progressBar = toast.querySelector('.progress-bar');
                if (progressBar) {
                    if (!toast.classList.contains('progress-in-progress')) {
                        const delay = parseInt(toast.getAttribute('data-bs-delay'));
                        progressBar.style.transition = `width ${delay}ms linear`;
                        progressBar.style.width = '100%';
                        toast.classList.add('progress-in-progress');

                        // Check when progress bar reaches 100% width
                        progressBar.addEventListener('transitionend', function() {
                            if (progressBar.style.width === '100%' && !toast.classList.contains(
                                    'hovered')) {
                                toast.remove();
                            }
                        });
                    }
                }
            }

            function resetProgressBar(toast) {
                const progressBar = toast.querySelector('.progress-bar');
                if (progressBar) {
                    progressBar.style.width = '0%';
                    toast.classList.remove('progress-in-progress');
                }
            }

            toasts.forEach(toast => {
                toast.addEventListener('mouseenter', function() {
                    toast.classList.add('hovered');
                    resetProgressBar(toast);
                });

                toast.addEventListener('mouseleave', function() {
                    toast.classList.remove('hovered');
                    startProgressBar(toast);
                });

                startProgressBar(toast);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#categories').select2({
                placeholder: '-- Select Category --',
                allowClear: true,
                width: '100%'
            });

        });
    </script>

    <script>
        // Design By
        // - https://dribbble.com/shots/13992184-File-Uploader-Drag-Drop

        // Select Upload-Area
        const uploadArea = document.querySelector('#uploadArea')

        // Select Drop-Zoon Area
        const dropZoon = document.querySelector('#dropZoon');

        // Loading Text
        const loadingText = document.querySelector('#loadingText');

        // Slect File Input 
        const fileInput = document.querySelector('#fileInput');

        // Select Preview Image
        const previewImage = document.querySelector('#previewImage');

        // File-Details Area
        const fileDetails = document.querySelector('#fileDetails');

        // Uploaded File
        const uploadedFile = document.querySelector('#uploadedFile');

        // Uploaded File Info
        const uploadedFileInfo = document.querySelector('#uploadedFileInfo');

        // Uploaded File  Name
        const uploadedFileName = document.querySelector('.uploaded-file__name');

        // Uploaded File Icon
        const uploadedFileIconText = document.querySelector('.uploaded-file__icon-text');

        // Uploaded File Counter
        const uploadedFileCounter = document.querySelector('.uploaded-file__counter');

        // ToolTip Data
        const toolTipData = document.querySelector('.upload-area__tooltip-data');

        // Images Types
        const imagesTypes = [
            "jpeg",
            "png",
            "svg",
            "gif"
        ];

        // Append Images Types Array Inisde Tooltip Data
        toolTipData.innerHTML = [...imagesTypes].join(', .');

        // When (drop-zoon) has (dragover) Event 
        dropZoon.addEventListener('dragover', function(event) {
            // Prevent Default Behavior 
            event.preventDefault();

            // Add Class (drop-zoon--over) On (drop-zoon)
            dropZoon.classList.add('drop-zoon--over');
        });

        // When (drop-zoon) has (dragleave) Event 
        dropZoon.addEventListener('dragleave', function(event) {
            // Remove Class (drop-zoon--over) from (drop-zoon)
            dropZoon.classList.remove('drop-zoon--over');
        });

        // When (drop-zoon) has (drop) Event 
        dropZoon.addEventListener('drop', function(event) {
            // Prevent Default Behavior 
            event.preventDefault();

            // Remove Class (drop-zoon--over) from (drop-zoon)
            dropZoon.classList.remove('drop-zoon--over');

            // Select The Dropped File
            const file = event.dataTransfer.files[0];

            // Call Function uploadFile(), And Send To Her The Dropped File :)
            uploadFile(file);
        });

        // When (drop-zoon) has (click) Event 
        dropZoon.addEventListener('click', function(event) {
            // Click The (fileInput)
            fileInput.click();
        });

        // When (fileInput) has (change) Event 
        fileInput.addEventListener('change', function(event) {
            // Select The Chosen File
            const file = event.target.files[0];

            // Call Function uploadFile(), And Send To Her The Chosen File :)
            uploadFile(file);
        });

        // Upload File Function
        function uploadFile(file) {
            // FileReader()
            const fileReader = new FileReader();
            // File Type 
            const fileType = file.type;
            // File Size 
            const fileSize = file.size;

            // If File Is Passed from the (File Validation) Function
            if (fileValidate(fileType, fileSize)) {
                // Add Class (drop-zoon--Uploaded) on (drop-zoon)
                dropZoon.classList.add('drop-zoon--Uploaded');

                // Show Loading-text
                loadingText.style.display = "block";
                // Hide Preview Image
                previewImage.style.display = 'none';

                // Remove Class (uploaded-file--open) From (uploadedFile)
                uploadedFile.classList.remove('uploaded-file--open');
                // Remove Class (uploaded-file__info--active) from (uploadedFileInfo)
                uploadedFileInfo.classList.remove('uploaded-file__info--active');

                // After File Reader Loaded 
                fileReader.addEventListener('load', function() {
                    // After Half Second 
                    setTimeout(function() {
                        // Add Class (upload-area--open) On (uploadArea)
                        uploadArea.classList.add('upload-area--open');

                        // Hide Loading-text (please-wait) Element
                        loadingText.style.display = "none";
                        // Show Preview Image
                        previewImage.style.display = 'block';

                        // Add Class (file-details--open) On (fileDetails)
                        fileDetails.classList.add('file-details--open');
                        // Add Class (uploaded-file--open) On (uploadedFile)
                        uploadedFile.classList.add('uploaded-file--open');
                        // Add Class (uploaded-file__info--active) On (uploadedFileInfo)
                        uploadedFileInfo.classList.add('uploaded-file__info--active');
                    }, 500); // 0.5s

                    // Add The (fileReader) Result Inside (previewImage) Source
                    previewImage.setAttribute('src', fileReader.result);

                    // Add File Name Inside Uploaded File Name
                    uploadedFileName.innerHTML = file.name;

                    // Call Function progressMove();
                    progressMove();
                });

                // Read (file) As Data Url 
                fileReader.readAsDataURL(file);
            } else { // Else

                this; // (this) Represent The fileValidate(fileType, fileSize) Function

            };
        };

        // Progress Counter Increase Function
        function progressMove() {
            // Counter Start
            let counter = 0;

            // After 600ms 
            setTimeout(() => {
                // Every 100ms
                let counterIncrease = setInterval(() => {
                    // If (counter) is equle 100 
                    if (counter === 100) {
                        // Stop (Counter Increase)
                        clearInterval(counterIncrease);
                    } else { // Else
                        // plus 10 on counter
                        counter = counter + 10;
                        // add (counter) vlaue inisde (uploadedFileCounter)
                        uploadedFileCounter.innerHTML = `${counter}%`
                    }
                }, 100);
            }, 600);
        };


        // Simple File Validate Function
        function fileValidate(fileType, fileSize) {
            // File Type Validation
            let isImage = imagesTypes.filter((type) => fileType.indexOf(`image/${type}`) !== -1);

            // If The Uploaded File Type Is 'jpeg'
            if (isImage[0] === 'jpeg') {
                // Add Inisde (uploadedFileIconText) The (jpg) Value
                uploadedFileIconText.innerHTML = 'jpg';
            } else { // else
                // Add Inisde (uploadedFileIconText) The Uploaded File Type 
                uploadedFileIconText.innerHTML = isImage[0];
            };

            // If The Uploaded File Is An Image
            if (isImage.length !== 0) {
                // Check, If File Size Is 2MB or Less
                if (fileSize <= 20971520) { // 20MB :)
                    return true;
                } else { // Else File Size
                    return alert('Please Your File Should be 2 Megabytes or Less');
                };
            } else { // Else File Type 
                return alert('Please make sure to upload An Image File Type');
            };
        };

        // :)
    </script>

</body>


</html>



{{-- @role('Influencer')
    <div class="row mt-2">
        <div class="col-md-6 pb-2">
            <div class="row">

                <div class="col-md-4"> --}}
{{-- <i class="fa fa-link"></i> --}}
{{-- <label>Instagram
    Username or Link:</label>
</div>
<div class="col-md-7">
    <input type="text" class=" form-control shadow-none " name="instagramUrl"
        value="{{ $influencer->instagramUrl }}" placeholder="username or @your_username" id="instagramUrl">
    @if ($errors->has('instagramUrl'))
        <span class="text-danger">{{ $errors->first('instagramUrl') }}</span>
    @endif
</div>
</div>
</div>
<div class="col-md-6 pb-2">
    <div class="row">

        <div class="col-md-4"><label>Instagram Followers:</label></div>
        <div class="col-md-7">
            <input type="text" class=" form-control shadow-none" name="instagramFollowers" value="{{ $influencer->instagramFollowers }}"
                placeholder="Enter your instagram followers" id="instagramUrl">
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-6 pb-2">
        <div class="row">

            <div class="col-md-4"><label>Youtube Channel Url:</label></div>
            <div class="col-md-7">
                <input type="text" class=" form-control shadow-none" name="youtubeChannelUrl" --}}
{{-- value="{{ $influencer->youtubeChannelUrl }}" --}}
{{-- placeholder="Enter your youtube channel" id="youtubeChannelUrl"> --}}
{{-- </div>
</div>
</div>
<div class="col-md-6 pb-2">
    <div class="row">

        <div class="col-md-4"><label>Youtube Subscriber:</label></div>
        <div class="col-md-7">
            <input type="text" class=" form-control shadow-none" name="youtubeSubscriber" value="{{ $influencer->youtubeSubscriber }}"
placeholder="Enter your youtube subscriber" id="youtubeSubscriber">
</div>
</div>
</div>
</div>
@endrole --}}
