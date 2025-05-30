<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Admin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

				<li>
					<a href="{{ route('admin.dashboard') }}">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>


				<li class="menu-label">Admin Menu</li>
				@if (Auth::user()->can('category.menu'))
					<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="lni lni-list"></i>
						</div>
						<div class="menu-title">Manage Category</div>
					</a>
					<ul>
					@if(Auth::user()->can('category.all'))
						<li> <a href="{{ route('all.category') }}"><i class='bx bx-radio-circle'></i>All Category</a></li>
					@endif
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('instructor.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-user"></i>
						</div>
						<div class="menu-title">Manage Instructor</div>
					</a>
					<ul>
						@if (Auth::user()->can('all.instructor'))
						<li> <a href="{{ route('all.instructor') }}"><i class='bx bx-radio-circle'></i>All Instructor</a>
						</li>
						@endif
					</ul>
					<ul>
						@if (Auth::user()->can('pending.instructor'))
						<li> <a href="{{ route('pending.instructor') }}"><i class='bx bx-radio-circle'></i>Pending Instructor</a>
						</li>
						@endif
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('course.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-book"></i>
						</div>
						<div class="menu-title">Manage Courses</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.all.course') }}"><i class="lni lni-book"></i>All Courses</a>
						</li>
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('coupon.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-ticket-alt"></i>
						</div>
						<div class="menu-title">Manage Coupon</div>
					</a>
					@if (Auth::user()->can('coupon.all'))
					<ul>
						<li> <a href="{{ route('admin.all.coupon') }}"><i class='bx bx-radio-circle'></i>All Coupons</a>
						</li>
					</ul>
					@endif
				</li>
				@endif

				@if (Auth::user()->can('setting.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-cog"></i>
						</div>
						<div class="menu-title">Manage Setting</div>
					</a>
					<ul>
						<li> <a href="{{ route('smtp.setting') }}"><i class='bx bx-radio-circle'></i>Manage SMTP</a>
						</li>
						<li> <a href="{{ route('site.setting') }}"><i class='bx bx-radio-circle'></i>Site Setting</a>
						</li>
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('order.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-cart"></i>
						</div>
						<div class="menu-title">Manage Orders</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.pending.order') }}"><i class='bx bx-radio-circle'></i>Pending Orders</a></li>
						<li> <a href="{{ route('admin.confirm.order') }}"><i class='bx bx-radio-circle'></i>Confirm Orders</a></li>
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('report.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-bar-chart"></i>
						</div>
						<div class="menu-title">Manage Report</div>
					</a>
					<ul>
						<li> <a href="{{ route('report.view') }}"><i class='bx bx-radio-circle'></i>Report View</a></li>
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('review.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-bubble"></i>
						</div>
						<div class="menu-title">Manage Review</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.pending.review') }}"><i class='bx bx-radio-circle'></i>Pending Review</a></li>
						<li> <a href="{{ route('admin.active.review') }}"><i class='bx bx-radio-circle'></i>Active Review</a></li>
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('comment.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-comments"></i>
						</div>
						<div class="menu-title">Manage Comments</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.pending.comment') }}"><i class='bx bx-radio-circle'></i>Pending Comment</a></li>
						<li> <a href="{{ route('admin.active.comment') }}"><i class='bx bx-radio-circle'></i>Active Comment</a></li>
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('testimonial.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-star"></i>
						</div>
						<div class="menu-title">Manage Testimonial</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.pending.testimonial') }}"><i class='bx bx-radio-circle'></i>Pending Testimonial</a></li>
						<li> <a href="{{ route('admin.active.testimonial') }}"><i class='bx bx-radio-circle'></i>Active Testimonial</a></li>
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('all.user.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-users"></i>
						</div>
						<div class="menu-title">Manage All User</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.user') }}"><i class='bx bx-radio-circle'></i>All User</a></li>
						{{-- <li> <a href="{{ route('all.instructor') }}"><i class='bx bx-radio-circle'></i>All Instructor</a></li> --}}
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('blog.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-pencil"></i>
						</div>
						<div class="menu-title">Manage Blog</div>
					</a>
					<ul>
						<li> <a href="{{ route('blog.category') }}"><i class='bx bx-radio-circle'></i>Blog Category</a></li>
						<li> <a href="{{ route('blog.post') }}"><i class='bx bx-radio-circle'></i>Blog Post</a></li>
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('role.permission.menu'))
				<li class="menu-label">Role & Permission</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-lock"></i>
						</div>
						<div class="menu-title">Role & Permission</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>All Permission</a></li>
						<li> <a href="{{ route('all.roles') }}"><i class='bx bx-radio-circle'></i>All Roles</a></li>
						<li> <a href="{{ route('add.roles.permission') }}"><i class='bx bx-radio-circle'></i>Role in Permission</a></li>
						<li> <a href="{{ route('all.roles.permission') }}"><i class='bx bx-radio-circle'></i>All Role in Permission</a></li>
					</ul>
				</li>
				@endif

				@if (Auth::user()->can('admin.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-shield"></i>
						</div>
						<div class="menu-title">Manage Admin</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.admin') }}"><i class='bx bx-radio-circle'></i>All Admin</a></li>
					</ul>
				</li>
				@endif
				{{-- <li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-map-alt"></i>
						</div>
						<div class="menu-title">Maps</div>
					</a>
					<ul>
						<li> <a href="map-google-maps.html"><i class='bx bx-radio-circle'></i>Google Maps</a>
						</li>
						<li> <a href="map-vector-maps.html"><i class='bx bx-radio-circle'></i>Vector Maps</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="https://themeforest.net/user/codervent" target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li> --}}
			</ul>
			<!--end navigation-->
		</div>
