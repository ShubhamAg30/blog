<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(){
        $data = [];
        $data["blogs"] = Blog::with("user")->published()->get();
        return view("blog.blog_list_frontend", $data);
    }

    public function list(Request $request){
        $data = [];
        $data["blogs"] = Blog::self()->get();
        return view("blog.blog_list", $data);
    }

    public function add(Request $request){
        $data = [];
        $data["error"] = "";

        if($request->isMethod("post")){
            try{
                $request->flash();
                $validator = Validator::make($request->all(), [
                    "title" => "required|max:100",
                    "description" => "required|max:1000",
                    "tags" => "nullable|regex:/^[a-zA-Z ,]*$/",
                    "status" => "required|in:DRAFT,PUBLISHED",
                    "published_at" => "nullable|date"
                ]);
                if($validator->fails()){
                    throw new Exception($validator->errors()->first());
                }

                $title = $request->input("title");
                $description = $request->input("description");
                $tags = $request->input("tags");
                $status = $request->input("status");
                $published_at = $request->input("published_at");

                $blog = new Blog();
                $blog->user_id = Auth::id();
                $blog->title = $title;
                $blog->description = $description;
                $blog->tags = $tags;
                $blog->status = $status;
                $blog->published_at = $published_at;
                $blog->save();

                return redirect(route("blog_list"));
            }catch(Exception $e){
                $data["error"] = $e->getMessage();
            }
        }
        return view("blog.blog_add", $data);
    }
}
