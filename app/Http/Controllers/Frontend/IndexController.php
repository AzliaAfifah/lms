<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Intervention\Image\ImageManager;
use App\Models\Course;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use App\Models\Course_goal;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Quiz;

class IndexController extends Controller
{
    public function CourseDetails($id,$slug)
    {
        $course = Course::find($id);
        $goals = Course_goal::where('course_id',$id)->orderBy('id','DESC')->get();

        $ins_id = $course->instructor_id;
        $instructorCourses = Course::where('instructor_id',$ins_id)->orderBy('id','DESC')->get();

        $categories = Category::latest()->get();

        $student = Order::where('user_id', $id)->get();
        $review = Review::where('user_id', $id)->get();

        $cat_id = $course->category_id;
        $relatedCourses = Course::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(3)->get();

        return view('frontend.course.course_details',compact('course','goals','instructorCourses','categories','relatedCourses','student','review'));
    }

    public function CategoryCourse($id, $slug)
    {
        $course = Course::where('category_id',$id)->where('status','1')->get();
        $courses = Course::where('category_id',$id)->where('status','1')->latest()->paginate(4);
        $category = Category::where('id',$id)->first();
        $categories = Category::latest()->get();
        return view('frontend.category.category_all',compact('courses','course','category','categories'));
    }

    public function CategoryAll()
    {
        return view('frontend.category.all_category');
    }

    public function CourseAll()
    {
        $course = Course::where('status','1')->get();
        return view('frontend.course.all_course', compact('course'));
    }

    public function SubCategoryCourse($id, $slug)
    {
        $courses = Course::where('subcategory_id',$id)->where('status','1')->get();
        $subcategory = SubCategory::where('id',$id)->first();
        $categories = Category::latest()->get();
        return view('frontend.category.subcategory_all',compact('courses','subcategory','categories'));
    }

    public function InstructorDetails($id)
    {
        $instructor = User::find($id);
        $courses = Course::where('instructor_id',$id)->get();
        $student = Order::where('user_id', $id)->get();
        $review = Review::where('user_id', $id)->get();
        return view('frontend.instructor.instructor_details',compact('instructor','courses','student','review'));
    }

    public function QuizCourse()
    {
        $questions = Quiz::all();
        $course = Course::first();

        return view('frontend.quiz.index', compact('questions','course'));
    }

    public function SearchCourse(Request $request)
    {
        $courses = Course::where('course_name', 'LIKE', "%{$request->search}%")->get();

        if ($courses->isEmpty()) {
            return response()->json(['html' => '<p>No courses found.</p>']);
        }

        $output = ''; // Pastikan $output awalnya kosong

        return response()->json(['html' => $output]);
    }

    public function getQuestions()
    {
        $questions = Quiz::all();

        $questionTypes = ['pg_text', 'pg_audio', 'essay_text', 'essay_audio'];

        $questions = $questions->sortBy(function ($question) use ($questionTypes) {
            return array_search($question->type, $questionTypes);
        });

        return response()->json($questions);
    }

}
