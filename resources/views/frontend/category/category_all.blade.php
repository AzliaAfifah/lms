@extends('frontend.master')
@section('home')
@section('title')
{{ $category->category_name }} | Linguana
@endsection
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area section-padding img-bg-2">
    <div class="overlay"></div>
    <div class="container">
        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
            <div class="section-heading">
                <h2 class="section__title text-white">{{ $category->category_name }}</h2>
            </div>
            <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                <li><a href="index.html">Home</a></li>
                <li>{{ $category->category_name }}</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!--======================================
        START COURSE AREA
======================================-->
<section class="course-area section--padding">
    <div class="container">
        <div class="filter-bar mb-4">
            <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                <p class="fs-14">We found <span class="text-black">{{ count($course) }}</span> courses available for you</p>
                <div class="d-flex flex-wrap align-items-center">
                    {{-- <ul class="filter-nav mr-3">
                        <li><a href="course-grid.html" data-toggle="tooltip" data-placement="top" title="Grid View" class="active"><span class="la la-th-large"></span></a></li>
                        <li><a href="course-list.html" data-toggle="tooltip" data-placement="top" title="List View"><span class="la la-list"></span></a></li>
                    </ul> --}}
                    <div class="select-container select--container">
                        {{-- <select class="select-container-select">
                            <option value="all-category">All Category</option>
                            <option value="newest">Newest courses</option>
                            <option value="oldest">Oldest courses</option>
                            <option value="high-rated">Highest rated</option>
                            <option value="popular-courses">Popular courses</option>
                            <option value="high-to-low">Price: high to low</option>
                            <option value="low-to-high">Price: low to high</option>
                        </select> --}}
                    </div>
                </div>
            </div><!-- end filter-bar-inner -->
        </div><!-- end filter-bar -->
        <div class="row">
            <div class="col-lg-4">
                <div class="sidebar mb-5">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-18 pb-2">Search Field</h3>
                            <div class="divider"><span></span></div>
                            <form method="get">
                                <div class="form-group mb-0">
                                    <input class="form-control form--control pl-3" type="search" id="search_input" name="search" placeholder="Search courses">
                                    <span class="la la-search search-icon"></span>
                                </div>
                            </form>
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-18 pb-2">Course Categories</h3>
                            <div class="divider"><span></span></div>
                            <ul class="generic-list-item">
                            @foreach ($categories as $cat)
                                <li><a href="{{ url('category/'.$cat->id.'/'.$cat->category_slug) }}">{{ $cat->category_name }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-18 pb-2">Level</h3>
                            <div class="divider"><span></span></div>
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox" required>
                                <label class="custom-control-label custom--control-label text-black" for="levelCheckbox">
                                    All Levels
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox2" required>
                                <label class="custom-control-label custom--control-label text-black" for="levelCheckbox2">
                                    Beginner
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox3" required>
                                <label class="custom-control-label custom--control-label text-black" for="levelCheckbox3">
                                    Middle
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox4" required>
                                <label class="custom-control-label custom--control-label text-black" for="levelCheckbox4">
                                    Advance
                                </label>
                            </div><!-- end custom-control -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-8">
                <div class="row">
                    @include('frontend.category.search_results')
                </div><!-- end row -->
                <div class="text-center pt-3">
                    <nav aria-label="Page navigation example" class="pagination-box">
                        {{ $courses->links('vendor.pagination.custom') }}
                    </nav>
                </div>
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end courses-area -->





<!--======================================
        END COURSE AREA
======================================-->

{{-- <script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type:'get',
            url:'{{ URL::to('search') }}',
            data:{'search':value},

            success:function(data);
            {
                console.log(data);
                $('#Content').html(data);
            }
        })
    })
</script> --}}

{{-- <script>
    $(document).ready(function () {
        $('#search_input').on('keyup', function () {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('search_course') }}",
                type: "GET",
                data: { search: query },
                success: function (data) {
                    $('#search_results').html(data.html);
                }
            });
        });
    });
</script> --}}

<script>
    $(document).ready(function () {
        $('#search_input').on('keyup', function () {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('search_course') }}",
                type: "GET",
                data: { search: query },
                success: function (data) {
                    $('.row').html(data.html); // Update hasil pencarian
                }
            });
        });
    });
</script>

@endsection
