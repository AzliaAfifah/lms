@php
use Illuminate\Support\Carbon;

$coupons = App\Models\Coupon::whereDate('coupon_validity', '>=', now())
    ->whereNotNull('coupon_announcement')
    ->where('coupon_announcement', '!=', '')
    ->latest()
    ->get();
@endphp

@if($coupons->count())
<section class="section--padding position-relative mb-4" style="background-color: #f7f7ff!important;">
    <span class="ring-shape ring-shape-1"></span>
    <span class="ring-shape ring-shape-2"></span>
    <span class="ring-shape ring-shape-3"></span>
    <span class="ring-shape ring-shape-4"></span>
    <span class="ring-shape ring-shape-5"></span>
    <span class="ring-shape ring-shape-6"></span>
    <span class="ring-shape ring-shape-7"></span>
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">Limited time offer</h5>
            <h2 class="section__title">New Discount Available</h2>
            <span class="section-divider"></span>
        </div>
        <div class="col-lg-10 mx-auto mt-50px">
            <div class="featured-course-carousel owl-action-styled owl--action-styled">
                @foreach($coupons as $coupon)
                    <div class="card card-item card-item-list-layout border border-gray shadow-none">
                        <div class="card-body">
                            <h5 class="card-title pb-1" style="font-size: 25px!important;">{{ $coupon->coupon_title }}</h5>
                            <p class="card-text pb-1" style="font-size: 18px!important; line-height: 35px;">{{ $coupon->coupon_announcement }}</p>
                            @if($coupon->course)
                                <div class="d-flex flex-wrap align-items-center fs-14">
                                    <p class="text-primary pb-2 mr-2" style="font-size: 18px">
                                        Course : 
                                        <span class="font-weight-bold pl-1">{{ $coupon->course->course_title }}</span>
                                    </p>
                                </div>
                            @endif
                            <div class="d-flex flex-wrap align-items-center fs-14">
                                <p class="text-success pb-2 mr-2" style="font-size: 18px">
                                    Offer valid until
                                    <span class="font-weight-bold pl-1">{{ \Carbon\Carbon::parse($coupon->coupon_validity)->format('F d, Y') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif