<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\Reply;
use Intervention\Image\Laravel\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function AllBlogCategory()
    {
        $category = BlogCategory::latest()->get();
        return view('admin.backend.blogcategory.blog_category',compact('category'));
    }

    public function StoreBlogCategory(Request $request)
    {
        BlogCategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
        ]);

        $notification = array(
            'message' => 'Blog Category Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditBlogCategory($id)
    {
        $categories = BlogCategory::find($id);
        return response()->json($categories);
    }

    public function UpdateBlogCategory(Request $request)
    {
        $cat_id = $request->cat_id;

        BlogCategory::find($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteBlogCategory($id)
    {
        BlogCategory::find($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    ////// All Blog Post

    public function BlogPost()
    {
        $post = BlogPost::latest()->get();
        return view('admin.backend.post.all_post', compact('post'));
    }

    public function AddBlogPost()
    {
        $blogcat = BlogCategory::latest()->get();
        return view('admin.backend.post.add_post', compact('blogcat'));
    }

    public function StoreBlogPost(Request $request)
    {
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
        Image::read($image)->resize(370,246)->save('upload/post/'. $name_gen);
        $save_url = 'upload/post/'. $name_gen;

        BlogPost::insert([
            'blogcat_id' => $request->blogcat_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
            'post_image' => $save_url,
            'long_descp' => $request->long_descp,
            'post_tags' => $request->post_tags,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.post')->with($notification);
    }

    public function EditBlogPost($id)
    {
        $blogcat = BlogCategory::latest()->get();
        $post = BlogPost::find($id);
        return view('admin.backend.post.edit_post', compact('post','blogcat'));
    }

    public function UpdateBlogPost(Request $request)
    {
        $post_id = $request->id;

        if ($request->file('post_image')) {

            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
            Image::read($image)->resize(370,246)->save('upload/post/'. $name_gen);
            $save_url = 'upload/post/'. $name_gen;

            Blogpost::find($post_id)->update([
                'blogcat_id' => $request->blogcat_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
                'post_image' => $save_url,
                'long_descp' => $request->long_descp,
                'post_tags' => $request->post_tags,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Post Updated Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('blog.post')->with($notification);
        } else {
            Blogpost::find($post_id)->update([
                'blogcat_id' => $request->blogcat_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
                'long_descp' => $request->long_descp,
                'post_tags' => $request->post_tags,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Post Updated Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('blog.post')->with($notification);
        }
    }

    public function DeleteBlogPost($id)
    {
        $item = BlogPost::find($id);
        $img = $item->post_image;
        unlink($img);

        BlogPost::find($id)->delete();

        $notification = array(
            'message' => 'Blog Post Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BlogDetails($slug)
    {
        $blog = BlogPost::where('post_slug', $slug)->first();
        $tags = $blog->post_tags;
        $tags_all = explode(',', $tags);
        $bcategory = BlogCategory::latest()->get();
        $post = BlogPost::latest()->limit(3)->get();

        // Ambil komentar beserta balasannya
        $comments = Comment::with('replies')->where('blogpost_id', $blog->id)->where('status','1')->latest()->get();
        $comment = Comment::with('user')->first();

        return view('frontend.blog.blog_details', compact('blog', 'tags_all', 'bcategory', 'post', 'comments','comment'));
    }

    public function BlogCatList($id)
    {
        $blog = BlogPost::where('blogcat_id',$id)->get();
        $breadcat = BlogCategory::where('id',$id)->first();
        $bcategory = BlogCategory::latest()->get();
        $post = BlogPost::latest()->limit(3)->get();
        return view('frontend.blog.blog_cat_list', compact('blog','breadcat','bcategory','post'));
    }

    public function BlogList()
    {
        $blog = BlogPost::latest()->paginate(4);
        $bcategory = BlogCategory::latest()->get();
        $post = BlogPost::latest()->limit(3)->get();
        return view('frontend.blog.blog_list', compact('blog','bcategory','post'));
    }

    public function StoreComment(Request $request)
    {
        // $blogId = BlogPost::find($request->id);
        // $blog = BlogPost::where('id',$blogId)->first();

        $blog = $request->blogpost_id;

        $request->validate([
            'blogpost_id' => 'required',
            'comment' => 'required',
        ]);

        Comment::insert([
            'blogpost_id' => $blog,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Comment Will Approved By Admin',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function StoreReply(Request $request)
    {
        // $blogId = BlogPost::find($request->id);
        // $blog = BlogPost::where('id',$blogId)->first();

        if(Auth::check()){
            $blog = $request->blogpost_id;
            $comment = $request->comment_id;

            $request->validate([
                'blogpost_id' => 'required',
                'comment_id' => 'required',
                'reply' => 'required',
            ]);

            Reply::insert([
                'blogpost_id' => $blog,
                'comment_id' => $comment,
                'user_id' => Auth::id(),
                'reply' => $request->reply,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Reply Will Approved By Admin',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'You Need to Login First!',
                'alert-type' => 'error'
             );

             return redirect()->back()->with($notification);
        }


    }

    public function AdminPendingComment()
    {
        $comment = Comment::where('status',0)->orderBy('id','DESC')->get();
        $reply = Reply::where('status',0)->orderBy('id','DESC')->get();
        return view('admin.backend.comment.pending_comment', compact('comment','reply'));
    }

    public function UpdateCommentStatus(Request $request)
    {
        $commentId = $request->input('comment_id');
        $isChecked = $request->input('is_checked',0);

        $comment = Comment::find($commentId);
        if($comment) {
            $comment->status = $isChecked;
            $comment->save();
        }

        return response()->json(['message' => 'Comment Status Updated Successfully']);
    }

    public function UpdateReplyStatus(Request $request)
    {
        $replyId = $request->input('reply_id');
        $isChecked = $request->input('is_checked',0);

        $reply = Reply::find($replyId);
        if($reply) {
            $reply->status = $isChecked;
            $reply->save();
        }

        return response()->json(['message' => 'Reply Status Updated Successfully']);
    }

    public function AdminActiveComment()
    {
        $comment = Comment::where('status',1)->orderBy('id','DESC')->get();
        $reply = Reply::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.backend.comment.active_comment', compact('comment','reply'));
    }
}
