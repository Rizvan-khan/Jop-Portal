@extends('employer.employerLaout.app')
@section('content')





<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-12 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="{{route ('employer.job.add-job')}}">
                    <h6 class="mb-3">Add Jobs</h6>
                    <p class="mb-0">Total Jobs {{ $totalJobs }}</p>
                </a>
            </div>

        </div>
    </div>
</div>
<!-- Category End -->


<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">

                    @if($alljob->count() > 0)
                    @foreach($alljob as $job)
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('theme/img/com-logo-1.jpg')}}" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">{{ $job->designation }}</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $job->address }}</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->salary }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-primary" href="{{ route('employer.job.edit-job', ['job_id' => $job->id]) }}"><i class="far fa-edit text-white"></i>
                                    </a>
                                    <form action="{{ route('employer.job.delete', ['job_id' => $job->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger text-white" onclick="return confirm('Are you sure you want to delete this job?')">
                                          <i class="far fa-trash-alt text-white"></i>
                                        </button>
                                    </form>

                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{ $job->created_at }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @else
                    <p class="text-center">No jobs added yet.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->

@endsection