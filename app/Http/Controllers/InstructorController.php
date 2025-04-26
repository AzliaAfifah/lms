<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Course;
use App\Models\InstructorDescription;

class InstructorController extends Controller
{
    public function InstructorDashboard()
    {
        return view('instructor.index');
    }

    public function InstructorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logout Successfully!',
            'alert-type' => 'info'
        );

        return redirect('/instructor/login')->with($notification);
    }

    public function InstructorLogin()
    {
        return view('instructor.instructor_login');
    }

    public function InstructorProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('instructor.instructor_profile_view', compact('profileData'));
    }

    public function InstructorProfileStore(Request $request)
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
            @unlink(public_path('upload/instructor_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/instructor_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        InstructorDescription::updateOrCreate(
            ['instructor_id' => $id],
            ['description' => $request->description]
        );

        $notification = array(
           'message' => 'Instructor Profile Updated Successfully!',
           'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function InstructorSocialMedia()
    {
        $id = Auth::user()->id;
        $media = InstructorDescription::where('instructor_id', $id)
                ->whereNotNull('platform')
                ->whereNotNull('url')
                ->orderBy('id', 'asc')
                ->select('id','platform', 'url')
                ->get();

        return view('instructor.instructor_social_media',compact('media'));
    }

    public function InstructorSocialMediaStore(Request $request)
    {
        InstructorDescription::insert([
            'instructor_id' => Auth::user()->id,
            'platform' => $request->platform,
            'url' => $request->url,
        ]);

        $notification = array(
            'message' => 'Social Media Add Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function InstructorSocialMediaEdit($id)
    {
        $media = InstructorDescription::find($id);
        return view('instructor.instructor_social_media_edit', compact('media'));
    }

    public function InstructorSocialMediaUpdate(Request $request, $id)
    {
        InstructorDescription::findOrFail($id)->update([
            'platform' => $request->platform,
            'url' => $request->url,
        ]);

        $notification = array(
            'message' => 'Social Media Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('instructor.social.media')->with($notification);
    }

    public function InstructorSocialMediaDelete($id)
    {
        $media = InstructorDescription::findOrFail($id);
        $media->delete();

        $notification = array(
            'message' => 'Social Media Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('instructor.social.media')->with($notification);
    }

    public function InstructorChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('instructor.instructor_change_password', compact('profileData'));

    }

    public function InstructorPasswordUpdate(Request $request)
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
}
