<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @vite(['resources/js/app.js'])


    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('frontend/images/favicon.png') }}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/tooltipster.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plyr.css') }}">
    <!-- end inject -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

<!-- start cssload-loader -->
<div class="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!--======================================
        START HEADER AREA
    ======================================-->
{{-- @include('frontend.body.header') --}}
<!--======================================
        END HEADER AREA
======================================-->

<!-- ================================
       START CONTACT AREA
================================= -->
<section class="contact-area section--padding position-relative">
    <span class="ring-shape ring-shape-1"></span>
    <span class="ring-shape ring-shape-2"></span>
    <span class="ring-shape ring-shape-3"></span>
    <span class="ring-shape ring-shape-4"></span>
    <span class="ring-shape ring-shape-5"></span>
    <span class="ring-shape ring-shape-6"></span>
    <span class="ring-shape ring-shape-7"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card card-item">
                    <div class="card-body">
                        <h3 class="card-title fs-24 lh-35 pb-2">Reset Password!</h3>
                        <p class="fs-15 lh-24 pb-3">Enter the email of your account to reset password
                        <div class="section-block"></div>
                        <form method="POST" action="{{ route('password.store') }}" class="pt-4">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="input-box">
                                <label class="label-text">Email Address</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="email" name="email" :value="old('email', $request->email)" placeholder="Enter email Address">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Password</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="password" type="password" name="password" placeholder="Enter Password">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Confirm Password</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Enter Confirm Password">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="btn-box">
                                <button class="btn theme-btn" type="submit">Reset Password <i class="la la-arrow-right icon ml-1"></i></button>
                                <div class="d-flex align-items-center justify-content-between fs-14 pt-2">
                                    <a href="login.html" class="text-color hover-underline">Login</a>
                                    <p>Not a member? <a href="sign-up.html" class="text-color hover-underline">Register</a></p>
                                </div>
                            </div><!-- end btn-box -->
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end contact-area -->
<!-- ================================
       END CONTACT AREA
================================= -->


<!-- ================================
         END FOOTER AREA
================================= -->
{{-- @include('frontend.body.footer') --}}
<!-- ================================
          END FOOTER AREA
================================= -->

<!-- start scroll top -->
<div id="scroll-top">
    <i class="la la-arrow-up" title="Go top"></i>
</div>
<!-- end scroll top -->


<!-- template js files -->
<script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.js') }}"></script>
<script src="{{ asset('frontend/js/waypoint.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/fancybox.js') }}"></script>
<script src="{{ asset('frontend/js/datedropper.min.js') }}"></script>
<script src="{{ asset('frontend/js/emojionearea.min.js') }}"></script>
<script src="{{ asset('frontend/js/tooltipster.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/plyr.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.lazy.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    var player = new Plyr('#player');
</script>

@include('frontend.body.script')

<script>
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 10000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});

document.addEventListener('DOMContentLoaded', function() {
    @if (session('message'))
    Toast.fire({
            icon: '{{ session('alert-type') }}',
            title: '{{ session('message') }}'
        });
    @endif
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const message = localStorage.getItem('toastr_message');
        const type = localStorage.getItem('toastr_type');

        if (message) {
            if (type === 'success') {
                toastr.success(message);
            } else if (type === 'error') {
                toastr.error(message);
            } else if (type === 'info') {
                toastr.info(message);
            } else if (type === 'warning') {
                toastr.warning(message);
            }

            localStorage.removeItem('toastr_message');
            localStorage.removeItem('toastr_type');
        }
    });
</script>

</body>
</html>
