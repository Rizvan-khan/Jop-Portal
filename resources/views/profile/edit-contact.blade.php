@extends('weblayout.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-md-8 col-lg-6">
        <h2 class="text-center mt-4 mb-2">Contact information</h2>
        <p class="text-center text-muted mb-4">Please fill out the form below. *required</p>

        <form method="POST" id="editContact" enctype="multipart/form-data" class="p-4 bg-white shadow-sm rounded">
            @csrf
            @method('PUT')

            {{-- First Name --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">First Name</label>
                <input type="text" value="{{$user['user_detail']['first_name']}}" class="form-control rounded" name="first_name">
            </div>

            {{-- Last Name --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Last Name</label>
                <input type="text" value="{{$user['user_detail']['last_name']}}"  class="form-control" name="last_name">
            </div>

            {{-- Headline --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Headline</label>
                <input type="text" value="{{$user['user_detail']['headline']}}"  class="form-control" name="headline">
            </div>

            {{-- Phone --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Phone Number</label>
                <input type="number" value="{{$user['user_detail']['phone']}}"  class="form-control" name="phone">
            </div>

             <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
               <input type="text" readonly value="{{ $user['email'] }}" class="form-control rounded" name="email">

            </div>


            <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" value="{{$user['user_detail']['show_phone_status']}}"  name="show_phone_status" id="showPhone">
                <label class="form-check-label" for="showPhone">Show my number on Job Portal</label>
            </div>

            {{-- Location --}}
            <h5 class="fw-semibold mt-4 mb-3">Location</h5>

            <div class="mb-3">
                <label class="form-label fw-semibold">Country</label>
                <input type="text" name="location" value="{{$user['user_detail']['location']}}"  class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">City/State</label>
                <input type="text" value="{{$user['user_detail']['city']}}"  name="city" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Pin Code</label>
                <input type="number" value="{{$user['user_detail']['pin_code']}}"  name="pin_code" class="form-control">
            </div>

            {{-- Relocation --}}
            <h5 class="fw-semibold mt-4 mb-3">Relocation</h5>

            <div class="form-check mb-2">
                <input type="radio" class="form-check-input" value="1" name="relocation" id="anywhere">
                <label class="form-check-label" for="anywhere">Anywhere in India</label>
            </div>

            <div class="form-check mb-4">
                <input type="radio" class="form-check-input" value="2" name="relocation" id="near">
                <label class="form-check-label" for="near">Only Near</label>
            </div>

            {{-- Save Button --}}
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 py-2 fw-semibold">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
