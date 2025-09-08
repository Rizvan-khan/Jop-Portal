@extends('weblayout.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-md-8 col-lg-6">
        <h2 class="text-center mt-4 mb-2">Resume </h2>
        <p class="text-center text-muted mb-4">Please upload the latest resume</p>

        <form method="POST" id="editResume" enctype="multipart/form-data" class="p-4 bg-white shadow-sm rounded">
            @csrf
            @method('PUT')

            {{-- First Name --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Upload Updated Resume</label>
                <input type="file" accept="application/pdf" class="form-control rounded" name="resume">
            </div>

            @if($user->resume && $user->resume->resume)
            <a href="{{ asset('storage/resumes/' . $user->resume->resume) }}" target="_blank" class="btn btn-primary">
                View / Download Old Resume
            </a>
            @else
            <p class="text-muted">No resume uploaded yet.</p>
            @endif




            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5 py-2 fw-semibold">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection