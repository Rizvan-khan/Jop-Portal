@extends('employer.employerLaout.app')

@section('content')
<div class="container">
    <h2>Add Company</h2>
    <form action="{{ route('employer.company.add-company.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label>Company Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Website</label>
            <input type="text" name="website" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Industry</label>
            <input type="text" name="industry" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Team Size</label>
            <input type="number" name="team_size" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Company</button>
    </form>
</div>
@endsection
