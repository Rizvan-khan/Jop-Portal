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
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <h6>Send Job Application</h6>
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <form method="post">
                                    <div class="col-sm-12 col-md-8  col-12 align-items-center">
                                        <div class="form-group">
                                            <lable for="name">Your Name</lable>
                                            <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->

@endsection