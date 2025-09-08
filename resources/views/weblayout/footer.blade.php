


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script data-cfasync="false" src="{{asset('theme/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script><script src="../../../code.jquery.com/jquery-3.4.1.min.js" type="39e2b84fceb4e994d105b107-text/javascript"></script>
    <script src="{{asset('theme/npm/bootstrap%405.0.0/dist/js/bootstrap.bundle.min.js')}}" type="39e2b84fceb4e994d105b107-text/javascript"></script>
    <script src="{{asset('theme/lib/wow/wow.min.js')}}" type="39e2b84fceb4e994d105b107-text/javascript"></script>
    <script src="{{asset('theme/lib/easing/easing.min.js')}}" type="39e2b84fceb4e994d105b107-text/javascript"></script>
    <script src="{{asset('theme/lib/waypoints/waypoints.min.js')}}" type="39e2b84fceb4e994d105b107-text/javascript"></script>
    <script src="{{asset('theme/lib/owlcarousel/owl.carousel.min.js')}}" type="39e2b84fceb4e994d105b107-text/javascript"></script>

    <!-- Template Javascript -->
    <script src="{{asset('theme/js/main.js')}}" type="39e2b84fceb4e994d105b107-text/javascript"></script>
<script src="{{ asset('theme/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="39e2b84fceb4e994d105b107-|49" defer></script></body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
$(document).ready(function () {
    $('#editContact').on('submit', function(e) {
        e.preventDefault();
$.ajax({
    url: "{{ route('profile.edit-contact') }}",
    type: "PUT",  // yaha PUT karo
    data: $(this).serialize(),
    success: function(response) {
        if(response.success){
            toastr.success(response.message, 'Success', {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right",
                timeOut: 3000
            });
        }
    },
    error: function(xhr) {
         toastr.error("Something went wrong!", 'Error', {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right",
        timeOut: 3000
    });
    }
});

    });
});


// upload resume 

$(document).ready(function () {
    $('#editResume').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this); // <-- yaha FormData use karo

        $.ajax({
            url: "{{ route('profile.edit-resume') }}",
            type: "POST",  // hamesha POST rakho, Laravel _method=PUT handle karega
            data: formData,
            processData: false, // ye do line zaroori hai
            contentType: false,
            success: function(response) {
                if(response.success){
                    toastr.success(response.message, 'Success', {
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: 3000
                    });
                }
            },
            error: function(xhr) {
                toastr.error("Something went wrong!", 'Error', {
                    closeButton: true,
                    progressBar: true,
                    positionClass: "toast-top-right",
                    timeOut: 3000
                });
                console.log(xhr.responseText); // debug ke liye
            }
        });
    });
});

// ends here



</script>


</html>