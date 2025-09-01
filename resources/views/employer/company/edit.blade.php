@extends('employer.employerLaout.app')

@section('content')
<div class="container">
    <h2>Edit Company</h2>

    <form action="{{ route('employer.company.edit', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        
        <div class="form-group mb-3">
            <label>Company Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $company->name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $company->email) }}">
        </div>

        <div class="form-group mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $company->phone) }}">
        </div>

        <div class="form-group mb-3">
            <label>Logo</label><br>
            @if($company->logo)
                <img src="{{ asset('storage/'.$company->logo) }}" alt="Company Logo" width="80" class="mb-2">
            @endif
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Website</label>
            <input type="text" name="website" class="form-control" value="{{ old('website', $company->website) }}">
        </div>

        <div class="form-group mb-3">
            <label>Industry</label>
            <input type="text" name="industry" class="form-control" value="{{ old('industry', $company->industry) }}">
        </div>

        <div class="form-group mb-3">
            <label>Team Size</label>
            <input type="number" name="team_size" class="form-control" value="{{ old('team_size', $company->team_size) }}">
        </div>

        <div class="form-group mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ old('address', $company->address) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Company</button>
    </form>
</div>
@endsection
