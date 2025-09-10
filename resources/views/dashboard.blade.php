@extends('weblayout.app')
@section('content')

<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That You Deserved</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                            <a href="#" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                            <a href="#" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                            <a href="#" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                            <a href="#" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Search Start -->
<form action="{{ route('jobs.list') }}" method="GET">
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-3">
                            <input type="text" name="keyword" value="{{ request('keyword') }}"
                                class="form-control border-0" placeholder="Keyword" />
                        </div>

                        <div class="col-md-4">
                            <select name="location" class="form-select border-0">
                                <option value="">Location</option>
                                <option value="Bareilly Uttar Pradesh" {{ request('location')=='Bareilly Uttar Pradesh' ? 'selected' : '' }}>Bareilly Uttar Pradesh</option>
                                <option value="Noida Up" {{ request('location')=='Noida Up' ? 'selected' : '' }}>Noida Up</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="time" class="form-select border-0">
                                <option value="">Time</option>
                                <option value="1" {{ request('time')=='1' ? 'selected' : '' }}>FUll Time</option>
                                <option value="2" {{ request('time')=='2' ? 'selected' : '' }}>Part Time</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark border-0 w-100">Search</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Search End -->

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">

                    @foreach ($alljobs as $all)



                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="{{asset ('theme/img/com-logo-1.jpg')}}" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">{{ $all->designation }}</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $all->location }}</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>@if($all->address=='1') Full Time @elseif($all->address=='2') Part Time @else Contractual @endif</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $all->salary }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <form method="post" action="{{route ('job.add',['job_id'=>$all->id]) }}">
                                         @csrf
                                        <button type="submit" class="btn btn-light btn-square me-3" onclick="return confirm('Do you want to save this job?')">
                                          <i class="far fa-heart text-primary"></i>
                                        </button>
                                    </form>
                                    <a class="btn btn-primary" href="{{ route('job.application', ['job_id' => $all->id]) }}">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ $all->created_at }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a class="btn btn-primary py-3 px-5" href="#">Browse More Jobs</a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->

@endsection