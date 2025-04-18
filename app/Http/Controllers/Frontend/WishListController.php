<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Intervention\Image\ImageManager;
use App\Models\Course;
use App\Models\User;
use App\Models\Wishlist;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class WishListController extends Controller
{
    public function AddToWishList(Request $request, $course_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('course_id',$course_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'course_id' => $course_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully added on your Wishlist']);
            } else {
                return response()->json(['error' => 'This Product Has Already on your wishlist']);
            }
        } else {
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }

    public function AllWishlist()
    {
        return view('frontend.wishlist.all_wishlist');
    }

    public function GetWishlistCourse()
    {
        $wishlist = Wishlist::with('course')->where('user_id',Auth::id())->latest()->get();

        $wishQty = Wishlist::where('user_id',Auth::id())->count();

        return response()->json(['wishlist' => $wishlist, 'wishQty' => $wishQty]);
    }

    public function RemoveWishlist($id)
    {
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();

        return response()->json(['success' =>  'Successfully Course Remove']);
    }
}
