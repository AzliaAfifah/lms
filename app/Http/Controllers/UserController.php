<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\QuizResult;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function Index()
    {
        return view('frontend.index');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.edit_profile', compact('profileData'));
    }

    public function UserProfileUpdate(Request $request)
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
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
           'message' => 'User Profile Updated Successfully!',
           'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logout Successfully!',
            'alert-type' => 'info'
        );

        return redirect('/login')->with($notification);
    }

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('frontend.dashboard.change_password', compact('profileData'));

    }

    public function UserPasswordUpdate(Request $request)
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

    public function LiveChat()
    {
        return view('frontend.dashboard.live_chat');
    }

    public function QuizAttempt()
    {
        $quizResult = QuizResult::where('user_id', auth()->id())->latest()->get();

        $total_questions = Quiz::select('course_id', DB::raw('COUNT(*) as total_questions'))
                            ->groupBy('course_id')
                            ->get();

        $quiz = QuizResult::where('user_id', auth()->id())->latest()->paginate(10);

        return view('frontend.dashboard.quiz_attempt', compact('quizResult', 'total_questions','quiz'));
    }
}
