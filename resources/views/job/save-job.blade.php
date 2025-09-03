@extends('weblayout.app')
@section('content')


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">

                    @foreach ($alljob as $all)



                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="{{asset ('theme/img/com-logo-1.jpg')}}" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">{{ $all->job->designation }}</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $all->job->location }}</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>@if($all->job->address=='1')full Time @elseif($all->job->address=='2') Part Time @else Conatractual @endif</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $all->job->salary }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <form method="post" action="{{route ('job.remove',['job_id'=>$all->id]) }}">
                                         @csrf
                                        <button type="submit" class="btn btn-light btn-square me-3" onclick="return confirm('Do you want to remove this job?')">
                                          <i class="far fa-heart text-danger"></i>
                                        </button>
                                    </form>
                                    <a class="btn btn-primary" href="{{route ('job.application') }}">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ $all->created_at }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->

@endsection