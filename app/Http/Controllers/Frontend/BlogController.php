<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
class BlogController extends Controller
{
    public function __construct(Blog $blog){
    	$this->blog = $blog;
    }
    public function index(){
    	$items = Blog::paginate(3);
    	return view('frontend.blog.blog',compact('items'));
    }
    public function singleBlog($id){
    	$blog = Blog::find($id);
    	$comment = Comment::with('user')->where("blog_id",$id)->where("parent_id",0)->with('childrenComments')->get();
    	$count = Comment::where("blog_id",$id)->count();
    	
   //return response($comments);
    	return View('frontend.blog.blog_single',compact('comment','blog','count'));
    	//return view('frontend.blog.blog',compact('items'));
    }
}
