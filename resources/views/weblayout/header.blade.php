<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Job Portal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.html" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&amp;family=Inter:wght@700;800&amp;display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="{{asset('theme/ajax/libs/font-awesome/5.10.0/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css')}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('theme/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('theme/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('theme/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="{{route ('dashboard')}}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">{{ Auth::user()->name }}</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{route('dashboard')}}" class="nav-item nav-link active">Home</a>
                    <a href="#" class="nav-item nav-link" data-bs-toggle="offcanvas" data-bs-target="#profileSidebar" aria-controls="profileSidebar">
                        Profile
                    </a>
                    <a class="nav-item nav-link" href="{{route('job.save-job')}}"><i class="far fa-heart text-primary"></i></a>
                </div>

            </div>
        </nav>
        <!-- Navbar End -->

        