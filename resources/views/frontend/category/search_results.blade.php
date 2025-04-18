@foreach($courses as $course)
<div class="col-lg-6 responsive-column-half">
    <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
        <div class="card-image">
            <a href="{{ url('course/details/'.$course->id.'/'.$course->course_name_slug) }}" class="d-block">
                <img class="card-img-top lazy" src="{{ asset($course->course_image) }}" data-src="{{ asset($course->course_image) }}" alt="Card image cap">
            </a>

            @php
            $amount = $course->selling_price - $course->discount_price;
            $discount = ($amount/$course->selling_price) * 100;
            @endphp

            <div class="course-badge-labels">
                @if ($course->bestseller == 1)
                <div class="course-badge">Bestseller</div>
                @else
                @endif
                @if ($course->discount_price == NULL)
                <div class="course-badge blue">New</div>
                @else
                <div class="course-badge blue">{{ round( $discount ) }}%</div>
                @endif
            </div>
        </div><!-- end card-image -->
        <div class="card-body">
            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{ $course->label }}</h6>
            <h5 class="card-title"><a href="{{ url('course/details/'.$course->id.'/'.$course->course_name_slug) }}">{{ $course->course_name }}</a></h5>
            <p class="card-text"><a href="teacher-detail.html">{{ $course['user']['name'] }}</a></p>
            <div class="rating-wrap d-flex align-items-center py-2">
                <div class="review-stars">
                    <span class="rating-number">4.4</span>
                    <span class="la la-star"></span>
                    <span class="la la-star"></span>
                    <span class="la la-star"></span>
                    <span class="la la-star"></span>
                    <span class="la la-star-o"></span>
                </div>
                {{-- <span class="rating-total pl-1">(20,230)</span> --}}
            </div><!-- end rating-wrap -->
            <div class="d-flex justify-content-between align-items-center">
                @if ($course->discount_price == NULL)
                <p class="card-price text-black font-weight-bold">${{ $course->selling_price }} </p>
                @else
                <p class="card-price text-black font-weight-bold">${{ $course->discount_price }} <span class="before-price font-weight-medium">${{ $course->selling_price }}</span></p>
                @endif
                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i class="la la-heart-o"></i></div>
            </div>
        </div><!-- end card-body -->
    </div><!-- end card -->
</div><!-- end col-lg-6 -->
@endforeach

@php
    $courseData = App\Models\Course::get();
@endphp

<!-- tooltip_templates -->
@foreach ($courseData as $item)
<div class="tooltip_templates">
    <div id="tooltip_content_1{{ $item->id }}">
        <div class="card card-item">
            <div class="card-body">
                <p class="card-text pb-2">By <a href="teacher-detail.html">{{ $item['user']['name'] }}</a></p>
                <h5 class="card-title pb-1"><a href="{{ url('course/details/'.$course->id.'/'.$course->course_name_slug) }}">{{ $item->course_name }}</a></h5>
                <div class="d-flex align-items-center pb-1">

                @if($item->bestseller == 1)
                    <h6 class="ribbon fs-14 mr-2">Bestseller</h6>
                @else
                    <h6 class="ribbon fs-14 mr-2">New</h6>
                @endif

                    <p class="text-success fs-14 font-weight-medium">Updated<span class="font-weight-bold pl-1">{{ $item->created_at->format('M d Y') }}</span></p>
                </div>
                <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center fs-14">
                    <li>{{ $item->duration }} total hours</li>
                    <li>{{ $item->label }}</li>
                </ul>
                <p class="card-text pt-1 fs-14 lh-22">{{ $item->prerequisite }}</p>

                @php
                $goals = App\Models\Course_goal::where('course_id',$item->id)->orderBy('id','DESC')->get();
                @endphp

                <ul class="generic-list-item fs-14 py-3">
                @foreach($goals as $goal)
                    <li><i class="la la-check mr-1 text-black"></i> {{ $goal->goal_name }}</li>
                @endforeach
                </ul>


                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn theme-btn flex-grow-1 mr-3" onclick="addToCart({{ $item->id }},'{{ $item->course_name }}','{{ $item->instructor_id }}','{{ $item->course_name_slug }}' )"><i class="la la-shopping-cart mr-1 fs-18"></i> Add to Cart</button>
                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i class="la la-heart-o" id="{{ $item->id }}" onclick="AddToWishList(this.id)"></i></div>
                </div>
            </div>
        </div><!-- end card -->
    </div>
</div><!-- end tooltip_templates -->
@endforeach



