@extends('frontend.master')
@section('home')
@section('title')
Linguana
@endsection

<!--================================
         START HERO AREA
=================================-->
@include('frontend.home.hero-area')
<!--================================
        END HERO AREA
=================================-->

<!--======================================
        START FEATURE AREA
 ======================================-->
@include('frontend.home.feature-area')
<!--======================================
       END FEATURE AREA
======================================-->

<!--======================================
        START CATEGORY AREA
======================================-->
@include('frontend.home.category-area')
<!--======================================
        END CATEGORY AREA
======================================-->

<!--======================================
        START COURSE AREA
======================================-->
@include('frontend.home.courses-area')
<!--======================================
        END COURSE AREA
======================================-->

<!--======================================
        START COURSE AREA
======================================-->
{{-- @include('frontend.home.courses-area-two') --}}
<!--======================================
        END COURSE AREA
======================================-->

<!-- ================================
       START FUNFACT AREA
================================= -->
@include('frontend.home.funfact-area')
<!-- ================================
       START FUNFACT AREA
================================= -->

<!--================================
         START TESTIMONIAL AREA
=================================-->
@include('frontend.home.testimonial-area')
<!--================================
        END TESTIMONIAL AREA
=================================-->

<div class="section-block"></div>

<!--======================================
        START ABOUT AREA
======================================-->
@include('frontend.home.about-area')
<!--======================================
        END ABOUT AREA
======================================-->

<div class="section-block"></div>

<!-- ================================
       START CLIENT-LOGO AREA
================================= -->
@include('frontend.home.client-logo-area')
<!-- ================================
       START CLIENT-LOGO AREA
================================= -->

<!-- ================================
       START BLOG AREA
================================= -->
@include('frontend.home.blog-area')
<!-- ================================
       START BLOG AREA
================================= -->

<!--======================================
        START GET STARTED AREA
======================================-->
@include('frontend.home.get-started-area')
<!-- ================================
       START GET STARTED AREA
================================= -->

<div class="section-block"></div>

<!--======================================
        START REGISTER AREA
======================================-->
@include('frontend.home.testimonial')
<!--======================================
        END REGISTER AREA
======================================-->

@endsection
