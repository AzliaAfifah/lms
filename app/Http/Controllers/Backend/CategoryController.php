<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $category = Category::latest()->get();
        return view('admin.backend.category.all_category', compact('category'));
    }

    public function AddCategory()
    {
        return view('admin.backend.category.add_category');
    }

    public function StoreCategory(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
        Image::read($image)->resize(370,246)->save('upload/category/'. $name_gen);
        $save_url = 'upload/category/'. $name_gen;

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
            'image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function EditCategory($id)
    {
        $category = Category::find($id);
        return view('admin.backend.category.edit_category', compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $cat_id = $request->id;

        if ($request->file('image')) {

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
            Image::read($image)->resize(370,246)->save('upload/category/'. $name_gen);
            $save_url = 'upload/category/'. $name_gen;

            Category::find($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Category Updated Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.category')->with($notification);
        } else {
            Category::find($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
            ]);

            $notification = array(
                'message' => 'Category Updated Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.category')->with($notification);
        }
    }

    public function DeleteCategory($id)
    {
        $item = Category::find($id);
        $img = $item->image;
        unlink($img);

        Category::find($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    //////// ALL SUB CATEGORY ////////
    public function AllSubCategory()
    {
        $subcategory = SubCategory::latest()->get();
        return view('admin.backend.subcategory.all_subcategory', compact('subcategory'));
    }

    public function AddSubCategory()
    {
        $category = Category::latest()->get();
        return view('admin.backend.subcategory.add_subcategory', compact('category'));

    }

    public function StoreSubCategory(Request $request)
    {
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function EditSubCategory($id)
    {
        $category = Category::latest()->get();
        $subcategory = SubCategory::find($id);
        return view('admin.backend.subcategory.edit_subcategory', compact('subcategory', 'category'));

    }

    public function UpdateSubCategory(Request $request)
    {
        $subcat_id = $request->id;

        SubCategory::find($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function DeleteSubCategory($id)
    {
        SubCategory::find($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
