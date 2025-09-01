@extends('employer.employerLaout.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container">
    <h4 class="mt-3 text-center text-success" >Add Jobs</h4>
    <form action="{{ route('employer.job.add-job.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label>Designation</label>
            <input type="text" name="designation" class="form-control" required>
        </div>

       <div class="form-group mb-3">
            <label>Requirement</label>
            <textarea name="requirement" id="requirement" class="form-control">
               
            </textarea>
        </div>

        <div class="form-group mb-3">
            <label>Salary</label>
            <input type="text" name="salary" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>


        <div class="form-group mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>

       <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" id="description" class="form-control">
               
            </textarea>
        </div>


        <button type="submit" class="btn btn-primary">Save Job</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>

<script>
    CKEDITOR.replace('requirement');
</script>
@endsection