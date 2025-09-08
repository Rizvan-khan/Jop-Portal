@extends('weblayout.app')
@section('content')


<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active rounded">
                    <!-- Job Item as Clickable Link -->
                  
                        <div class="job-item p-4 mb-4 rounded shadow-sm">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Details</h5>
                                         <span class="text-truncate me-3"><i class="fa fa username text-primary me-2"></i>{{ Auth::user()->name}}</span>
                                    <span class="text-truncate me-0"><i class="far fa email text-primary me-2"></i>{{ Auth::user()->email }}</span>
                                
                                    </div>
                                </div>
                                 <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                              
                                         <a class="btn btn-light btn-square me-3"  href="{{route ('profile.edit-contact')}}"> <i class="far fa-edit text-primary"></i></a>
                    
                                </div>
                                
                            </div>

                            </div>
                        </div>
                  
                    <!-- End Job Item -->

                </div>
            </div>

             <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active rounded">
                   
                        <div class="job-item p-4 mb-4 rounded shadow-sm">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Ressume Update</h5>
                                    </div>
                                </div>
                                  <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                              
                                         <a class="btn btn-light btn-square me-3"  href="{{route ('profile.edit-resume')}}"> <i class="far fa-edit text-primary"></i></a>
                    
                                </div>
                                
                            </div>
                            </div>
                        </div>
                   
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Jobs End -->


<!-- Sidebar (Offcanvas) -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="profileSidebar" aria-labelledby="profileSidebarLabel">
    <div class="offcanvas-header">
        <h5 id="profileSidebarLabel">Profile</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <!-- Profile Options with Card Style -->
        <div class="d-grid gap-3">
            <a href="{{route ('profile')}}" class="card shadow-sm text-decoration-none">
                <div class="card-body text-center">
                    <h6 class="mb-0">Account Settings</h6>
                </div>
            </a>

            <a href="#" class="card shadow-sm text-decoration-none">
                <div class="card-body text-center">
                    <h6 class="mb-0">Applied</h6>
                </div>
            </a>

            <a href="#" class="card shadow-sm text-decoration-none">
                <div class="card-body text-center text-danger fw-bold">
                    <h6 class="mb-0">Logout</h6>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection