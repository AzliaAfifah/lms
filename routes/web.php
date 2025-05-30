<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\QuestionController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\ActiveUserController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ChatController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\Frontend\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use App\Models\QuizResult;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'Index'])->name('index');

Route::get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->middleware(['auth', 'roles:user', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::get('/user/logout', [UserController::class,  'UserLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');

    Route::get('/live/chat', [UserController::class, 'LiveChat'])->name('live.chat');
    Route::get('/quiz/attempt', [UserController::class, 'QuizAttempt'])->name('quiz.attempt');

    Route::controller(WishListController::class)->group(function (){
        Route::get('/user/wishlist','AllWishlist')->name('user.wishlist');
        Route::get('/get-wishlist-course/','GetWishlistCourse');
        Route::get('/wishlist-remove/{id}','RemoveWishlist');
    });

    Route::controller(OrderController::class)->group(function (){
        Route::get('/my/course','MyCourse')->name('my.course');
        Route::get('/course/view/{course_id}','CourseView')->name('course.view');
    });

    Route::controller(QuestionController::class)->group(function (){
        Route::post('/user/question','UserQuestion')->name('user.question');
    });
});

require __DIR__.'/auth.php';

// Admin Group Middleware
Route::middleware(['auth','roles:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    // Category All Route
    Route::controller(CategoryController::class)->group(function (){
        Route::get('/all/category','AllCategory')->name('all.category')->middleware('permission:category.all');
        Route::get('/add/category','AddCategory')->name('add.category');
        Route::post('/store/category','StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
        Route::post('/update/category','UpdateCategory')->name('update.category');
        Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category');
    });

    // SubCategory All Route
    Route::controller(CategoryController::class)->group(function (){
        Route::get('/all/subcategory','AllSubCategory')->name('all.subcategory');
        Route::get('/add/subcategory','AddSubCategory')->name('add.subcategory');
        Route::post('/store/subcategory','StoreSubCategory')->name('store.subcategory');
        Route::get('/edit/subcategory/{id}','EditSubCategory')->name('edit.subcategory');
        Route::post('/update/subcategory','UpdateSubCategory')->name('update.subcategory');
        Route::get('/delete/subcategory/{id}','DeleteSubCategory')->name('delete.subcategory');
    });

    // Instructor All Route
    Route::controller(AdminController::class)->group(function (){
        Route::post('/update/user/status','UpdateUserStatus')->name('update.user.status');
        Route::get('/pending/instructor','PendingInstructor')->name('pending.instructor');
        Route::get('/instructor/details/page/{user_id}','InstructorDetailsPage')->name('instructor.details.page');

        Route::put('/instructor/{user_id}/approve', [AdminController::class, 'InstructorApproved'])->name('instructor.approve');
        Route::put('/instructor/{user_id}/rejected', [AdminController::class, 'InstructorRejected'])->name('instructor.rejected');
    });

    // Admin Course All Route
    Route::controller(AdminController::class)->group(function (){
        Route::get('admin/all/course','AdminAllCourse')->name('admin.all.course');
        Route::post('/update/course/status','UpdateCourseStatus')->name('update.course.status');
        Route::get('admin/course/details/{id}','AdminCourseDetails')->name('admin.course.details');
    });

    // Admin Coupon All Route
    Route::controller(CouponController::class)->group(function (){
        Route::get('admin/all/coupon','AdminAllCoupon')->name('admin.all.coupon');
        Route::get('admin/add/coupon','AdminAddCoupon')->name('admin.add.coupon');
        Route::post('admin/store/coupon','AdminStoreCoupon')->name('admin.store.coupon');
        Route::get('admin/edit/coupon/{id}','AdminEditCoupon')->name('admin.edit.coupon');
        Route::post('admin/update/coupon','AdminUpdateCoupon')->name('admin.update.coupon');
        Route::get('admin/delete/coupon/{id}','AdminDeleteCoupon')->name('admin.delete.coupon');
        Route::get('admin/add/coupon/announcement','AdminAddCouponAnnouncement')->name('admin.add.coupon.announcement');
        Route::post('admin/store/coupon/announcement','AdminStoreCouponAnnouncement')->name('admin.store.coupon.announcement');
    });

    // SMTP Setting
    Route::controller(SettingController::class)->group(function (){
        Route::get('/smtp/setting','SmtpSetting')->name('smtp.setting');
        Route::post('update/smtp','SmtpUpdate')->name('update.smtp');
    });

    // Site Setting
    Route::controller(SettingController::class)->group(function (){
        Route::get('/site/setting','SiteSetting')->name('site.setting');
        Route::post('update/site','UpdateSite')->name('update.site');
    });

    // Admin All Order Route
    Route::controller(OrderController::class)->group(function (){
        Route::get('/admin/pending/order','AdminPendingOrder')->name('admin.pending.order');
        Route::get('/admin/order/details/{id}','AdminOrderDetails')->name('admin.order.details');
        Route::get('/pending-confirm/{id}','PendingToConfirm')->name('pending-confirm');
        Route::get('/admin/confirm/order','AdminConfirmOrder')->name('admin.confirm.order');
    });

    // Admin Report Route
    Route::controller(ReportController::class)->group(function (){
        Route::get('/report/view','ReportView')->name('report.view');
        Route::post('/search/by/date','SearchByDate')->name('search.by.date');
        Route::post('/search/by/month','SearchByMonth')->name('search.by.month');
        Route::post('/search/by/year','SearchByYear')->name('search.by.year');
    });

    // Admin Review Route
    Route::controller(ReviewController::class)->group(function (){
        Route::get('/admin/pending/review','AdminPendingReview')->name('admin.pending.review');
        Route::post('/update/review/status','UpdateReviewStatus')->name('update.review.status');
        Route::get('/admin/active/review','AdminActiveReview')->name('admin.active.review');
    });

    // Admin Testimonial Route
    Route::controller(TestimonialController::class)->group(function (){
        Route::get('/admin/pending/testimonial','AdminPendingTestimonial')->name('admin.pending.testimonial');
        Route::post('/update/testimonial/status','UpdateTestimonialStatus')->name('update.testimonial.status');
        Route::get('/admin/active/testimonial','AdminActiveTestimonial')->name('admin.active.testimonial');
    });

    // Admin All User and Instructor Route
    Route::controller(ActiveUserController::class)->group(function (){
        Route::get('/all/user','AllUser')->name('all.user');
        Route::get('/all/instructor','AllInstructor')->name('all.instructor');
    });

    // Admin All Blog Category Route
    Route::controller(BlogController::class)->group(function (){
        Route::get('/blog/category','AllBlogCategory')->name('blog.category');
        Route::post('/blog/category/store','StoreBlogCategory')->name('blog.category.store');
        Route::get('/edit/blog/category/{id}','EditBlogCategory');
        Route::post('/update/blog/category','UpdateBlogCategory')->name('blog.category.update');
        Route::get('/delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');
        Route::get('/admin/pending/comment','AdminPendingComment')->name('admin.pending.comment');
        Route::post('/update/comment/status','UpdateCommentStatus')->name('update.comment.status');
        Route::post('/update/reply/status','UpdateReplyStatus')->name('update.reply.status');
        Route::get('/admin/active/comment','AdminActiveComment')->name('admin.active.comment');
    });

    // Admin All Blog Post Route
    Route::controller(BlogController::class)->group(function (){
        Route::get('/blog/post','BlogPost')->name('blog.post');
        Route::get('add/blog/post','AddBlogPost')->name('add.blog.post');
        Route::post('store/blog/post','StoreBlogPost')->name('store.blog.post');
        Route::get('/edit/post/{id}','EditBlogPost')->name('edit.post');
        Route::post('update/blog/post','UpdateBlogPost')->name('update.blog.post');
        Route::get('/delete/post/{id}','DeleteBlogPost')->name('delete.post');
    });

     // Permission All Route
     Route::controller(RoleController::class)->group(function (){
        Route::get('/all/permission','AllPermission')->name('all.permission');
        Route::get('/add/permission','AddPermission')->name('add.permission');
        Route::post('/store/permission','StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission');
        Route::post('update/permission','UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}','DeletePermission')->name('delete.permission');

        Route::get('/import/permission','ImportPermission')->name('import.permission');
        Route::get('/export','Export')->name('export');
        Route::post('/import','Import')->name('import');
    });

    // Roles All Route
    Route::controller(RoleController::class)->group(function (){
        Route::get('/all/roles','AllRoles')->name('all.roles');
        Route::get('/add/roles','AddRoles')->name('add.roles');
        Route::post('/store/roles','StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles');
        Route::post('update/roles','UpdateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}','DeleteRoles')->name('delete.roles');

        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission');
        Route::post('/store/roles/permission','StoreRolesPermission')->name('role.permission.store');
        Route::get('/all/roles/permission','AllRolesPermission')->name('all.roles.permission');
        Route::get('admin/edit/roles/{id}','AdminEditRoles')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}','AdminRolesUpdate')->name('admin.roles.update');
        Route::get('admin/delete/roles/{id}','AdminDeleteRoles')->name('admin.delete.roles');
    });

    // Admin User All Route
    Route::controller(AdminController::class)->group(function (){
        Route::get('/all/admin','AllAdmin')->name('all.admin');
        Route::get('/add/admin','AddAdmin')->name('add.admin');
        Route::post('/store/admin','StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}','EditAdmin')->name('edit.admin');
        Route::post('update/admin/{id}','UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}','DeleteAdmin')->name('delete.admin');
    });
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/become/instructor', [AdminController::class, 'BecomeInstructor'])->name('become.instructor');
Route::get('/instructor/registration', [AdminController::class, 'InstructorRegistration'])->name('instructor.registration');
Route::get('/instructor/registration/education-background', [AdminController::class, 'EducationBackground'])->name('education.background');
Route::post('/instructor/registration/store-education-background', [AdminController::class, 'StoreEducationBackground'])->name('store.education.background');
Route::post('/instructor/register', [AdminController::class, 'InstructorRegister'])->name('instructor.register');

// Instructor Group Middleware
Route::middleware(['auth','roles:instructor'])->group(function(){
    Route::get('/instructor/dashboard', [InstructorController::class, 'InstructorDashboard'])->name('instructor.dashboard');
    Route::get('/instructor/logout', [InstructorController::class, 'InstructorLogout'])->name('instructor.logout');
    Route::get('/instructor/profile', [InstructorController::class, 'InstructorProfile'])->name('instructor.profile');
    Route::get('/instructor/social-media', [InstructorController::class, 'InstructorSocialMedia'])->name('instructor.social.media');
    Route::post('/instructor/social-media/store', [InstructorController::class, 'InstructorSocialMediaStore'])->name('instructor.social.media.store');
    Route::get('/instructor/social-media/edit/{id}', [InstructorController::class, 'InstructorSocialMediaEdit'])->name('instructor.social.media.edit');
    Route::post('/instructor/social-media/update/{id}', [InstructorController::class, 'InstructorSocialMediaUpdate'])->name('instructor.social.media.update');
    Route::get('/instructor/social-media/delete/{id}', [InstructorController::class, 'InstructorSocialMediaDelete'])->name('instructor.social.media.delete');
    Route::post('/instructor/profile/store', [InstructorController::class, 'InstructorProfileStore'])->name('instructor.profile.store');
    Route::get('/instructor/change/password', [InstructorController::class, 'InstructorChangePassword'])->name('instructor.change.password');
    Route::post('/instructor/password/update', [InstructorController::class, 'InstructorPasswordUpdate'])->name('instructor.password.update');

    Route::controller(CourseController::class)->group(function (){
        Route::get('/all/course','AllCourse')->name('all.course');
        Route::get('/add/course','AddCourse')->name('add.course');
        Route::get('/subcategory/ajax/{category_id}','GetSubCategory');
        Route::post('/store/course','StoreCourse')->name('store.course');
        Route::get('/edit/course/{id}','EditCourse')->name('edit.course');
        Route::post('/update/course','UpdateCourse')->name('update.course');
        Route::post('/update/course/image','UpdateCourseImage')->name('update.course.image');
        Route::post('/update/course/video','UpdateCourseVideo')->name('update.course.video');
        Route::post('/update/course/goal','UpdateCourseGoal')->name('update.course.goal');
        Route::get('/delete/course/{id}','DeleteCourse')->name('delete.course');

        Route::get('/all/quiz/{id}', 'AllQuiz')->name('all.quiz');
        Route::get('/add/quiz/{id}', 'AddQuiz')->name('add.quiz');
        Route::post('/store/quiz', 'StoreQuiz')->name('store.quiz');
        Route::get('/edit/quiz/{id}', 'EditQuiz')->name('edit.quiz');
        Route::post('/update/quiz/{id}', 'UpdateQuiz')->name('update.quiz');
        Route::get('/delete/quiz/{id}', 'DeleteQuiz')->name('delete.quiz');
    });

    Route::controller(CourseController::class)->group(function (){
        Route::get('/add/course/lecture/{id}','AddCourseLecture')->name('add.course.lecture');
        Route::post('/add/course/section/','AddCourseSection')->name('add.course.section');
        Route::post('/save-lecture/','SaveLecture')->name('save-lecture');
        Route::get('/edit/lecture/{id}','EditLecture')->name('edit.lecture');
        Route::post('/update/course/lecture/','UpdateCourseLecture')->name('update.course.lecture');
        Route::get('/delete/lecture/{id}','DeleteLecture')->name('delete.lecture');
        Route::post('/delete/section/{id}','DeleteSection')->name('delete.section');
        Route::post('/update/lecture/status','UpdateLectureStatus')->name('update.lecture.status');
    });

    // Instructor All Order Route
    Route::controller(OrderController::class)->group(function (){
        Route::get('/instructor/all/order','InstructorAllOrder')->name('instructor.all.order');
        Route::get('/instructor/order/details/{payment_id}','InstructorOrderDetails')->name('instructor.order.details');
        Route::get('/instructor/order/invoice/{payment_id}','InstructorOrderInvoice')->name('instructor.order.invoice');
    });

    // Instructor All Question Route
    Route::controller(QuestionController::class)->group(function (){
        Route::get('/instructor/all/question','InstructorAllQuestion')->name('instructor.all.question');
        Route::get('/question/details/{id}','QuestionDetails')->name('question.details');
        Route::post('/instructor/replay','InstructorReplay')->name('instructor.replay');
    });

    // Instructor All Coupon Route
    Route::controller(CouponController::class)->group(function (){
        Route::get('instructor/all/coupon','InstructorAllCoupon')->name('instructor.all.coupon');
        Route::get('instructor/add/coupon','InstructorAddCoupon')->name('instructor.add.coupon');
        Route::post('instructor/store/coupon','InstructorStoreCoupon')->name('instructor.store.coupon');
        Route::get('instructor/edit/coupon/{id}','InstructorEditCoupon')->name('instructor.edit.coupon');
        Route::post('instructor/update/coupon','InstructorUpdateCoupon')->name('instructor.update.coupon');
        Route::get('instructor/delete/coupon/{id}','InstructorDeleteCoupon')->name('instructor.delete.coupon');
    });

    // Instructor Review Route
    Route::controller(ReviewController::class)->group(function (){
        Route::get('/instructor/all/review','InstructorAllReview')->name('instructor.all.review');
    });
});

// Route Accessable for All
Route::get('/instructor/login', [InstructorController::class, 'InstructorLogin'])->name('instructor.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/course/details/{id}/{slug}', [IndexController::class, 'CourseDetails']);
Route::get('/category/{id}/{slug}', [IndexController::class, 'CategoryCourse']);
Route::get('/category/all', [IndexController::class, 'CategoryAll'])->name('category.all');
// Route::get('/funfact', [IndexController::class, 'Funfact']);
Route::get('/course/all', [IndexController::class, 'CourseAll'])->name('course.all');
// Route::get('/subcategory/{id}/{slug}', [IndexController::class, 'SubCategoryCourse']);
Route::get('/instructor/details/{id}', [IndexController::class, 'InstructorDetails'])->name('instructor.details');
Route::post('/add-to-wishlist/{course_id}', [WishListController::class, 'AddToWishList']);

Route::post('/store/testimonial', [TestimonialController::class, 'StoreTestimonial'])->name('store.testimonial');


Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
Route::post('/buy/data/store/{id}', [CartController::class, 'BuyToCart']);

Route::get('/cart/data/', [CartController::class, 'CartData']);
Route::get('/course/mini/cart/', [CartController::class, 'AddMiniCart']);

Route::get('/minicart/course/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Cart All Route
Route::controller(CartController::class)->group(function (){
    Route::get('/mycart','MyCart')->name('mycart');
    Route::get('/get-cart-course','GetCartCourse');
    Route::get('/cart-remove/{rowId}','CartRemove');
});

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::post('/inscoupon-apply', [CartController::class, 'InsCouponApply']);

Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

// Checkout Page Route
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

Route::post('/payment', [CartController::class, 'Payment'])->name('payment');
Route::post('/stripe_order', [CartController::class, 'StripeOrder'])->name('stripe_order');

Route::post('/midtrans_order', [CartController::class, 'MidtransOrder'])->name('midtrans_order');

Route::post('/store/review', [ReviewController::class, 'StoreReview'])->name('store.review');

Route::get('/blog/details/{slug}', [BlogController::class, 'BlogDetails']);
Route::get('/blog/cat/list/{id}', [BlogController::class, 'BlogCatList']);
Route::get('/blog', [BlogController::class, 'BlogList'])->name('blog');
Route::post('/store/comment', [BlogController::class, 'StoreComment'])->name('store.comment');
Route::post('/store/reply', [BlogController::class, 'StoreReply'])->name('store.reply');

// Route::post('/mark-notification-as-read/{notification}', [CartController::class, 'MarkAsRead']);
Route::post('/mark-notification-as-read/{notificationId}', [CartController::class, 'MarkAsRead']);

// Chat Route
Route::post('/send-message', [ChatController::class, 'SendMessage']);
Route::get('/user-all', [ChatController::class, 'GetAllUsers']);
Route::get('/user-message/{id}', [ChatController::class, 'UserMsgById']);
Route::get('/instructor/live/chat', [ChatController::class, 'InstructorLiveChat'])->name('instructor.live.chat');

// Route::get('/search/course', [IndexController::class, 'SearchCourse'])->name('search_course');

// Quiz Route
Route::get('/quiz/course/{id}', [IndexController::class, 'QuizCourse'])->name('quiz.course');
Route::get('/quiz/result/{id}/{score}/{total}/{correct}/{wrong}', [IndexController::class, 'QuizResult'])->name('quiz.result');

Route::post('/quiz/result/store', function (Request $request){
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'correct_answers' => 'required|numeric',
        'wrong_answers' => 'required|numeric',
        'score' => 'required|integer',
        'correct_answer_data' => 'nullable|array',
        'wrong_answer_data' => 'nullable|array',
    ]);

    QuizResult::create([
        'user_id' => auth()->id(),
        'course_id' => $request->course_id,
        'correct_answers' => $request->score,
        'wrong_answers' => $request->correct_answers,
        'score' => $request->wrong_answers,
        'correct_answer_data' => json_encode($request->correct_answer_data),
        'wrong_answer_data' => json_encode($request->wrong_answer_data),
    ]);


    return response()->json(['message' => 'Quiz result saved successfully!']);

})->middleware('auth');

Route::get('/search/course/', [CourseController::class, 'SearchCourse'])->name('search_course');


