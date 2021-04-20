<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function index(){
    	//$data = Comment::all();
    	//dd($data);
    	$comment = Comment::with('user')->where("blog_id",3)->where("parent_id",0)->with('childrenComments')->get();
    	//dd($comment);
   //return response($comments);
    	return View('frontend.blog.blog_single',compact('comment'));

    	
    }
     public function add(Request $req){
     	//dd($req);
     	if($req->cmt != ""){
     		$c = new Comment();
     		$c->user_id= $req->user_id;
     		$c->blog_id = $req->blog_id;
     		$c->cmt =$req->cmt;
     		$c->parent_id =$req->parent_id;
     		$c->save();

     		$data = Comment::with('user')->where("blog_id",$req->blog_id)->where("parent_id",0)->with('childrenComments')->get();
     		$count = Comment::with('user')->where("blog_id",$req->blog_id)->count();
     		$html = view('frontend.blog.commentAjax')->with(compact('data','req','count'))->render();
     		//dd($html);
            return response()->json(['success' => true, 'html' => $html]);
     	}
     	
     	
     }
     public function addP(Request $req){
     	//dd($req);
     	if($req->cmt != ""){
     		$c = new Comment();
     		$c->user_id= $req->user_id;
     		$c->blog_id = $req->blog_id;
     		$c->cmt =$req->cmt;
     		$c->parent_id =$req->parent_id;
     		$c->save();
     		$cmt_id=$c->id;

     		//$data = Comment::with('user')->where("blog_id",$req->blog_id)->where("parent_id",0)->with('childrenComments')->get();

     		$html = view('frontend.blog.commentPAjax')->with(compact('req','cmt_id'))->render();
     		//dd($html);
            return response()->json(['success' => true, 'html' => $html]);
     	}
     	
     	
     }
}
