<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LectureChecklist;
use Illuminate\Http\Request;
use App\Models\Category;
// use App\Models\SubCategory;
use Intervention\Image\ImageManager;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use App\Models\Course_goal;
use App\Models\Quiz;
use App\Models\User;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;


class CourseController extends Controller
{
    public function AllCourse()
    {
        $id = Auth::user()->id;
        $courses = Course::where('instructor_id',$id)->orderBy('id','asc')->get();

        return view('instructor.courses.all_course',compact('courses'));
    }

    public function AddCourse()
    {
        $categories = Category::latest()->get();

        return view('instructor.courses.add_course',compact('categories'));
    }

    // public function GetSubCategory($category_id)
    // {
    //     $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name','ASC')->get();
    //     return json_encode($subcat);
    // }

    public function StoreCourse(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4|max:10000',
        ]);

        $image = $request->file('course_image');
        $name_gen = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
        Image::read($image)->resize(370,246)->save('upload/course/thambnail/'. $name_gen);
        $save_url = 'upload/course/thambnail/'. $name_gen;

        $video = $request->file('video');
        $videoName = time().'.'. $video->getClientOriginalExtension();
        $video->move(public_path('upload/course/video/'),$videoName);
        $save_video = 'upload/course/video/'. $videoName;

        $course_id = Course::insertGetId([
            'category_id' => $request->category_id,
            'instructor_id' => Auth::user()->id,
            'course_image' => $save_url,
            'course_title' => $request->course_title,
            'course_name' => $request->course_name,
            'course_name_slug' => strtolower(str_replace(' ','-',$request->course_name)),
            'description' => $request->description,
            'video' => $save_video,
            'label' => $request->label,
            'duration' => $request->duration,
            'resources' => $request->resources,
            'certificate' => $request->certificate,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'prerequisite' => $request->prerequisite,
            'bestseller' => $request->bestseller,
            'featured' => $request->featured,
            'highestrated' => $request->highestrated,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // Course Goals Add Form
        $goals = Count($request->course_goals);
        if ($goals != NULL) {
            for ($i=0; $i < $goals; $i++) {
                $gcount = new Course_goal();
                $gcount->course_id = $course_id;
                $gcount->goal_name = $request->course_goals[$i];
                $gcount->save();
            }
        }

        $notification = array(
            'message' => 'Course Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.course')->with($notification);
    }

    public function EditCourse($id)
    {
        $course = Course::find($id);
        $goals = Course_goal::where('course_id',$id)->get();
        $categories = Category::latest()->get();
        // $subcategories = SubCategory::where('category_id', $course->category_id)->get();
        $course_goals = Course_goal::where('course_id', $id)->get();

        return view('instructor.courses.edit_course',compact('course','categories','course_goals','goals'));
    }

    public function UpdateCourse(Request $request)
    {
        // $image = $request->file('course_image');
        // $name_gen = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
        // Image::read($image)->resize(370,246)->save('upload/course/thambnail/'. $name_gen);
        // $save_url = 'upload/course/thambnail/'. $name_gen;

        // $video = $request->file('video');
        // $videoName = time().'.'. $video->getClientOriginalExtension();
        // $video->move(public_path('upload/course/video/').$videoName);
        // $save_video = 'upload/course/video/'. $videoName;

        $cid =  $request->id;

        Course::find($cid)->update([
            'category_id' => $request->category_id,
            // 'subcategory_id' => $request->subcategory_id,
            'instructor_id' => Auth::user()->id,
            'course_title' => $request->course_title,
            'course_name' => $request->course_name,
            'course_name_slug' => strtolower(str_replace(' ','-',$request->course_name)),
            'description' => $request->description,
            'label' => $request->label,
            'duration' => $request->duration,
            'resources' => $request->resources,
            'certificate' => $request->certificate,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'prerequisite' => $request->prerequisite,
            'bestseller' => $request->bestseller,
            'featured' => $request->featured,
            'highestrated' => $request->highestrated,
        ]);

        // Course Goals Add Form
        // $goals = Count($request->course_goals);
        // if ($goals != NULL) {
        //     for ($i=0; $i < $goals; $i++) {
        //         $gcount = new Course_goal();
        //         $gcount->course_id = $course_id;
        //         $gcount->goal_name = $request->course_goals[$i];
        //         $gcount->save();
        //     }
        // }

        $notification = array(
            'message' => 'Course Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.course')->with($notification);
    }

    public function UpdateCourseImage(Request $request)
    {
        $course_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('course_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(370,246)->save('upload/course/thambnail/'.$name_gen);
        $save_url = 'upload/course/thambnail/'.$name_gen;

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        Course::find($course_id)->update([
            'course_image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Course Image Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function UpdateCourseVideo(Request $request)
    {
        $course_id = $request->id;
        $oldVideo = $request->old_vid;

        $video = $request->file('video');
        $videoName = time().'.'.$video->getClientOriginalExtension();
        $video->move(public_path('upload/course/video/'),$videoName);
        $save_video = 'upload/course/video/'.$videoName;

        if (file_exists($oldVideo)) {
            unlink($oldVideo);
        }

        Course::find($course_id)->update([
            'video' => $save_video,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Course Video Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function UpdateCourseGoal(Request $request)
    {
        $cid = $request->id;

        if ($request->course_goals == NULL) {
            return redirect()->back();
        } else {
            Course_goal::where('course_id',$cid)->delete();

            $goals = Count($request->course_goals);

                for ($i=0; $i < $goals; $i++) {
                    $gcount = new Course_goal();
                    $gcount->course_id = $cid;
                    $gcount->goal_name = $request->course_goals[$i];
                    $gcount->save();
                }
        }

        $notification = array(
            'message' => 'Course Goals Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteCourse($id)
    {
        $course = Course::find($id);
        unlink($course->course_image);
        unlink($course->video);

        Course::find($id)->delete();

        $goalsData = Course_goal::where('course_id',$id)->get();
        foreach ($goalsData as $item) {
            $item->goal_name;
            Course_goal::where('course_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Course Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AddCourseLecture($id)
    {
        $course = Course::find($id);

        $section = CourseSection::where('course_id',$id)->latest()->get();

        return view('instructor.courses.section.add_course_lecture',compact('course', 'section'));
    }

    public function AddCourseSection(Request $request)
    {
        $cid = $request->id;

        CourseSection::insert([
            'course_id' => $cid,
            'section_title' => $request->section_title,
        ]);

        $notification = array(
            'message' => 'Course Section Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SaveLecture(Request $request)
    {
        $request->validate([
            'lecture_video' => 'nullable|file|mimes:mp4,webm|max:102400',
        ]);

        $lecture = new CourseLecture();
        $lecture->course_id = $request->course_id;
        $lecture->section_id = $request->section_id;
        $lecture->lecture_title = $request->lecture_title;
        $lecture->url = $request->lecture_url;
        $lecture->content = $request->content;

        if ($request->hasFile('lecture_video')) {
            $video = $request->file('lecture_video');
            $videoName = time().'_'.$video->getClientOriginalName();
            $video->move(public_path('upload/lecture_videos'), $videoName);
            $lecture->video = 'upload/lecture_videos/' . $videoName;
        }

        $lecture->save();

        return response()->json(['success' => 'Lecture saved successfully']);
    }

    public function EditLecture($id)
    {
        $clecture = CourseLecture::find($id);
        return view('instructor.courses.lecture.edit_course_lecture',compact('clecture'));
    }

    public function UpdateCourseLecture(Request $request)
    {
        $request->validate([
            'video_type' => 'required|in:url,file',
            'video' => 'nullable|file|mimes:mp4,webm|max:102400',
            'url' => 'nullable|url',
        ]);

        $lecture = CourseLecture::findOrFail($request->id);

        if ($request->video_type === 'file') {
            $lecture->url = null;

            if ($request->hasFile('video')) {
                if ($lecture->video && file_exists(public_path($lecture->video))) {
                    unlink(public_path($lecture->video));
                }

                $video = $request->file('video');
                $videoName = time().'_'.$video->getClientOriginalName();
                $video->move(public_path('upload/lecture_videos'), $videoName);
                $lecture->video = 'upload/lecture_videos/' . $videoName;
            }
        } elseif ($request->video_type === 'url') {
            if ($lecture->video && file_exists(public_path($lecture->video))) {
                unlink(public_path($lecture->video));
            }

            $lecture->video = null;
            $lecture->url = $request->url;
        }

        $lecture->lecture_title = $request->lecture_title;
        $lecture->content = $request->content;
        $lecture->save();

      $notification = array(
        'message' => 'Course Lecture Updated Successfully!',
        'alert-type' => 'success'
    );

        return redirect()->back()->with($notification);
    }

    public function DeleteLecture($id)
    {
        CourseLecture::find($id)->delete();

        $notification = array(
        'message' => 'Course Lecture Deleted Successfully!',
        'alert-type' => 'success'
    );

        return redirect()->back()->with($notification);
    }

    // public function UpdateLectureStatus(Request $request)
    // {
    //     $userId = auth()->id();
    //     $lectureId = $request->lecture_id;
    //     $status = $request->checked ? '1' : '0';

    //     $checklist = LectureChecklist::updateOrCreate(
    //         ['user_id' => $userId, 'lecture_id' => $lectureId],
    //         ['status' => $status]
    //     );

    //     return response()->json([
    //         'success' => true,
    //         'checklist' => $checklist,
    //         'message' => 'Course Lecture Checked Successfully!'
    //     ]);
    // }

    public function UpdateLectureStatus(Request $request)
    {
        LectureChecklist::updateOrCreate([
            'user_id' => auth()->id(),
            'lecture_id' => $request->lecture_id
        ], [
            'status' => 1
        ]);

        return response()->json(['success' => true]);
    }


    public function DeleteSection($id)
    {
        $section = CourseSection::find($id);

        /// Delete Related Lectures
        $section->lectures()->delete();

        /// Delete the section
        $section->delete();

        $notification = array(
            'message' => 'Course Section Deleted Successfully!',
            'alert-type' => 'success'
        );

            return redirect()->back()->with($notification);
    }

    public function AllQuiz($id)
    {
        $course = Course::findOrFail($id);
        $quizzes = Quiz::where('course_id', $course->id)->orderBy('id', 'asc')->get();

        return view('instructor.courses.quiz.all_quiz', compact('course','quizzes'));
    }

    public function AddQuiz($id)
    {
        $course = Course::findOrFail($id);
        return view('instructor.courses.quiz.add_quiz', compact('course'));
    }

    public function StoreQuiz(Request $request)
    {

        $request->merge([
            'question' => $request->input('question_text'),
            'type' => $request->input('question_type'),
            'correct_answer' => $request->input('answer')
        ]);


        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'question' => 'nullable|string',
            'type' => 'required|in:pg_text,essay_text,pg_audio,essay_audio',
            'options' => 'nullable|array',
            'correct_answer' => 'nullable|string',
            'audio' => 'nullable|mimes:mp3,wav',
        ]);

        $audioUrl = null;
        if ($request->hasFile('audio')) {
            $audioFile = $request->file('audio');
            $audioName = $audioFile->hashName();

            $audioFile->move(public_path('quizzes_audio'), $audioName);
            $audioUrl = url('quizzes_audio/' . $audioName);
        }

        Quiz::create([
            'course_id' => $request->course_id,
            'question' => $request->question,
            'type' => $request->type,
            'options' => $request->type == 'pg_text' || $request->type == 'pg_audio' ? json_encode($request->options) : null,
            'correct_answer' => $request->correct_answer,
            'audio_path' => $audioUrl,
        ]);

        $notification = array(
            'message' => 'Quiz added successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditQuiz($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('instructor.courses.quiz.edit_quiz', compact('quiz'));
    }

    public function UpdateQuiz(Request $request, $id)
    {
        $request->validate([
            'question' => 'nullable|string',
            'type' => 'required|in:pg_text,essay_text,pg_audio,essay_audio',
            'correct_answer' => 'nullable|string',
            'options' => 'nullable|array',
            'audio' => 'nullable|mimes:mp3,wav',
        ]);

        $quiz = Quiz::findOrFail($id);

        if ($request->hasFile('audio')) {
            if ($quiz->audio_path) {
                $oldAudioPath = public_path('quizzes_audio/' . $quiz->audio_path);
                if (File::exists($oldAudioPath)) {
                    File::delete($oldAudioPath);
                }
            }

            $audioFile = $request->file('audio');
            $audioName = $audioFile->hashName();
            $audioPath = $audioFile->move(public_path('quizzes_audio'), $audioName);

            $audioUrl = url('quizzes_audio/' . $audioName);
        } else {
            $audioUrl = $quiz->audio_path;
        }

        $quiz->update([
            'question' => $request->question,
            'type' => $request->type,
            'correct_answer' => $request->correct_answer,
            'options' => in_array($request->type, ['pg_text', 'pg_audio']) ? json_encode($request->options) : null,
            'audio_path' => $audioUrl,
        ]);

        $notification = array(
            'message' => 'Quiz updated successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('all.quiz', $quiz->course_id)->with($notification);
    }

    public function DeleteQuiz($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->back()->with('message', 'Quiz deleted successfully!');
    }

    public function SearchCourse(Request $request)
    {
        $query = $request->get('search');
        $courses = Course::where('course_name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%") // Misalnya, jika Anda ingin mencari di deskripsi juga
            ->with('user') // Mengambil relasi user
            ->get();

        return response()->json([
            'html' => view('frontend.category.search_results', compact('courses'))->render()
        ]);
    }

}
