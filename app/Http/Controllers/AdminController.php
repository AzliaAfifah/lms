<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Course;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\Review;
use App\Models\Testimonial;
use App\Models\BlogPost;
use App\Models\Payment;
use App\Models\BlogCategory;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $category = Category::get();
        $course = Course::where('status', '1')->get();
        $courses = Course::where('status', '0')->get();
        $coupon = Coupon::where('coupon_validity', '>', Carbon::today())->get();
        $coupons = Coupon::where('coupon_validity', '<', Carbon::today())->get();
        $pendingOrder = Payment::where('status', 'pending')->get();
        $activeOrder = Payment::where('status', 'confirm')->get();
        $pendingReview = Review::where('status', '0')->get();
        $activeReview = Review::where('status', '1')->get();
        $pendingTestimonial = Testimonial::where('status', '0')->get();
        $activeTestimonial = Testimonial::where('status', '1')->get();
        $users = User::where('role','user')->latest()->get();
        $instructors = User::where('role','instructor')->latest()->get();
        $Blog = BlogPost::get();
        $BlogCategory = BlogCategory::get();
        return view('admin.index', compact('coupons','category','course','courses','coupon','pendingReview','activeReview','pendingTestimonial','activeTestimonial','users','Blog','BlogCategory','activeOrder','pendingOrder','instructors'));
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logout Successfully!',
            'alert-type' => 'info'
        );

        return redirect('/admin/login')->with($notification);
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
           'message' => 'Admin Profile Updated Successfully!',
           'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_change_password', compact('profileData'));

    }

    public function AdminPasswordUpdate(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error'
             );

             return back()->with($notification);
        }

        // Update The new Password
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Change Successfully!',
            'alert-type' => 'success'
         );

         return back()->with($notification);
    }

    public function BecomeInstructor()
    {
        return view('frontend.instructor.reg_instructor');
    }

    public function InstructorRegistration()
    {
        return view('frontend.instructor.instructor_register');
    }

    public function InstructorRegister(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string', 'unique:users'],
        ]);

        User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'instructor',
            'status' => '0',
        ]);

        $notification = array(
            'message' => 'Instructor Registered Successfully!',
            'alert-type' => 'success'
        );

         return redirect()->route('instructor.login')->with($notification);
    }

    public function AllInstructor()
    {
        $allinstructor = User::where('role', 'instructor')->latest()->get();

        return view('admin.backend.instructor.all_instructor', compact('allinstructor'));
    }

    public function UpdateUserStatus(Request $request)
    {
        $userId = $request->input('user_id');
        $isChecked = $request->input('is_checked',0);

        $user = User::find($userId);
        if($user) {
            $user->status = $isChecked;
            $user->save();
        }

        return response()->json(['message' => 'User Status Updated Successfully']);
    }

    public function AdminAllCourse()
    {
        $course = Course::latest()->get();
        return view('admin.backend.courses.all_course', compact('course'));
    }

    public function UpdateCourseStatus(Request $request)
    {
        $courseId = $request->input('course_id');
        $isChecked = $request->input('is_checked',0);

        $course = Course::find($courseId);
        if($course) {
            $course->status = $isChecked;
            $course->save();
        }

        return response()->json(['message' => 'Course Status Updated Successfully']);
    }

    public function AdminCourseDetails($id)
    {
        $course = Course::find($id);
        return view('admin.backend.courses.course_details', compact('course'));
    }

    public function AllAdmin()
    {
        $alladmin = User::where('role', 'admin')->get();
        return view('admin.backend.pages.admin.all_admin',compact('alladmin'));
    }

    public function AddAdmin()
    {
        $roles = Role::all();
        return view('admin.backend.pages.admin.add_admin',compact('roles'));
    }

    public function StoreAdmin(Request $request)
    {
        $role = Role::findById($request->roles);

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = '1';
        $user->save();

        $user->assignRole($role);

        $notification = array(
            'message' => 'New Admin Inserted Successfully!',
            'alert-type' => 'success'
        );

         return redirect()->route('all.admin')->with($notification);
    }

    public function EditAdmin($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.backend.pages.admin.edit_admin', compact('user','roles'));
    }

    public function UpdateAdmin(Request $request, $id)
    {
        $role = Role::findById($request->roles);

        $user = User::find($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = '1';
        $user->save();

        $user->roles()->detach();
        $user->assignRole($role);

        $notification = array(
            'message' => 'Admin Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    }

    public function DeleteAdmin($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Admin Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
