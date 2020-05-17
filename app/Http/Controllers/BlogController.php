<?php

namespace App\Http\Controllers;

use App\AdminBlog;
use App\AdminCategory;
use App\BlogPostCategory;
use App\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getAllBlog(){
        $posts = AdminBlog::with('user','blogCat.admincategory')->get();
        return response()->json([
            'posts' => $posts
        ],200);
    }

    public function getSingleBlog($id){
        $post = AdminBlog::with('user','blogCat.admincategory','comment')->find($id);
        return response()->json([
            'post' => $post
        ],200);
    }

    public function getCategories(){
        $categories = AdminCategory::all();
        return response()->json([
            'categories' => $categories
        ],200);
    }

    public function getCatBlog($id){
        $post = BlogPostCategory::with('adminblog','admincategory')->where('cat_id',$id)->get();
//        $post = AdminBlog::with('user','blogCat.admincategory')->where('cat_id',$id)->get();
//        return $po
        return response()->json([
            'post' => $post
        ],200);
    }

    public function seacrhPost(){
        $search = \Request::get('s');
        $posts = AdminBlog::with('user','blogCat.admincategory')
                        ->where('title','LIKE',"%$search%")
                        ->get();
        return response()->json([
            'posts' => $posts
        ],200);
    }

    public function addComment(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'comment' => 'required'
        ]);
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->blog_id = $request->blog_id;
        $comment->save();
        return ['message'=>'ok'];
    }

}
