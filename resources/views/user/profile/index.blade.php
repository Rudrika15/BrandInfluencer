<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('influencerbrand/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-image: linear-gradient(#5ccde4, #4d77ad);
            height: 800vh;
        }


        .text-blue {
            color: #1d4880 !important;
        }

        .bg-blue {
            background-color: #1d4880 !important;
            color: #fff !important;
        }

        .bg-blue:hover {
            background-color: #15c6eb !important;
            color: #fff !important;
        }

        .text-lightblue {
            color: #15c6eb !important;
        }

        .bg-lightblue {
            background-color: #15c6eb !important;
            color: #fff !important;
        }

        .img-thumbnail {
            object-fit: contain;
            height: 200px;
            width: 200px;
        }
    </style>

</head>

<body>
    <div class="container rounded bg-light mt-5">

        <div class="row pt-5 ">
            <div class="col-md-6 text-center">
                <img src="{{ asset('profile') }}/{{ Auth::user()->profilePhoto }}" class="img-thumbnail rounded-circle w-50" alt="image">
            </div>
            <div class="col-md-6 pt-3 pb-2">
                <h4 class="text-blue">{{ Auth::user()->name }}</h4>
                <h6 class="text-muted">@ {{ Auth::user()->username }}</h6>

                <div class="text-end mt-5 pt-5">
                    <a href="#" class="btn btn-sm bg-blue mt-3 ">Edit Profile</a>
                </div>
            </div>
            <hr>
        </div>

        <h4 class="text-blue pt-3 ps-4">My posts</h4>
        <div class="row p-5">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('profile') }}/{{ Auth::user()->profilePhoto }}" alt="Profile Picture">
                        <div class="user-info">
                            <h5 class="username">name</h5>
                            <p class="post-time">Posted by {{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="post-content">detail</p>
                        <hr>
                        <img src="{{ asset('campaignPhoto/1707222310.jpg') }}" alt="Post Image" class="post-image card-img">
                    </div>
                    <div class="card-footer">
                        <button class="like-btn"><i class="fa fa-heart"></i> Like</button>
                        <button class="comment-btn"><i class="fa fa-comment"></i> Comment</button>
                        <button class="share-btn"><i class="fa fa-share"></i> Share</button>
                    </div>
                </div>



            </div>
            <div class="col-md-4 border rounded p-3">
                <h5 class="text-lightblue pt-2">Categories</h5>
                <span class="badge bg-lightblue">{{ $details->categoryDetails->name }}</span>

                <br>
                <hr>

                <h5 class="text-lightblue pt-2">Email</h5>
                <a href="mailto:{{ Auth::user()->email }}" class="text-muted fst-italic">{{ Auth::user()->email }} <small> <i class="bi bi-box-arrow-up-right"></i> </small></a>

            </div>
        </div>
    </div>




    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
