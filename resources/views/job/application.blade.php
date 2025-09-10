@extends('weblayout.app')
@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container d-flex justify-content-center">
    <div class="col-md-8 col-lg-6">
        <h2 class="text-center mt-4 mb-2">Send Job Application</h2>
        <p class="text-center text-muted mb-4">Send Job Application and get hired by recruiter fast.</p>

        <form method="POST" action="{{ route('job.application.submit') }}" enctype="multipart/form-data" class="p-4 bg-white shadow-sm rounded">
            @csrf

            {{-- First Name --}}
            <div class="mb-3">
                <input type="text" value="{{ Auth::user()->user_detail->first_name }}" class="form-control rounded" name="name" readonly>
            </div>

            {{-- Resume --}}
            @if(Auth::user()->resume && Auth::user()->resume->resume)
                <div class="mb-3">
                    <iframe src="{{ asset('storage/resumes/' . Auth::user()->resume->resume) }}"
                        width="100%" height="400px" style="border:1px solid black;"></iframe>
                </div>
            @else
                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Updated Resume</label>
                    <input type="file" accept="application/pdf" class="form-control rounded" name="resume">
                </div>
            @endif

            {{-- Job ID --}}
            <input type="hidden" value="{{ $job_id }}" name="job_id">

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5 py-2 fw-semibold">Apply</button>
            </div>
        </form>
    </div>
</div>
@endsection
