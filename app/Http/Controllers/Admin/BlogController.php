<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
	public function index(){
		//$items =Blog::all()->user;
		//dd($items->user->username);
		$items = Blog::paginate(5);
		return view('admin.blog.index',compact('items'));
	}
    public function getAdd(){
    	return view('admin.blog.add');
    }
    public function postAdd(BlogRequest $req){
    	$author = Auth::id();
    	
    	//dd($blog);
    	$blog = new Blog();
    	$blog->title = $req->title;
    	$blog->author = $author;
    	$blog->description = $req->description;
    	$blog->content = $req->content;
     	if ($req->hasFile('image')) {
           	
            $file = $req->image;
            $blog->image = $file->getClientOriginalName();
            $file->move('upload/user/blog', $file->getClientOriginalName());
        }

        $blog->save();
        return redirect()->route('admin.blog')->with('success', __('Update profile success.'));
    }
    public function getEdit($id){
    	$item = Blog::find($id);
    	return view('admin.blog.edit',compact('item'));
    }
    public function postEdit($id, BlogRequest $req){
    	$blog = Blog::find($id);
    	
    	//dd($blog);
    	$blog->title = $req->title;
    	
    	if($req->content != null){
    		$blog->content =$req->content;
    	}
    	if($req->description != null){
    		$blog->description = $req->description;
    	}
    	// "Code xư lý upload file:
     	if ($req->hasFile('image')) {
           	if (file_exists( 'upload/user/blog/' .$blog->image)){
           		unlink('upload/user/blog/' .$blog->image);
           	}
            $file = $req->image;
            $blog->image = $file->getClientOriginalName();
            $file->move('upload/user/blog/', $file->getClientOriginalName());
        }

        $blog->save();
        return redirect()->route('admin.blog');
    }
    public function del($id){
    	$item = Blog::find($id);
    	$item->delete();

    	return redirect()->route('admin.blog');
    }
}
