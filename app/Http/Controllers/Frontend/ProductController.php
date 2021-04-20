<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use Image;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
// use Illuminate\Support\Facades\File; 
class ProductController extends Controller
{
    public function __construct(Product $product){
    	$this->product = $product;
    }
    public function productUser(){
    	$items = Product::where('user_id',Auth::id())->get();
    	return view('frontend.account.product.product',compact('items'));
    }
    public function getAdd(){
    	return view('frontend.account.product.add');
    }
    public function postAdd(ProductRequest $request){

         if($request->hasfile('img'))
        {

            foreach($request->file('img') as $image)
            {

                $name = rand(0,100).$image->getClientOriginalName();
                $name_2 = "2".$name;
                $name_3 = "3".$name;

                //$image->move('upload/product/', $name);
                
                $path = public_path('upload/product/' . $name);
                $path2 = public_path('upload/product/' . $name_2);
                $path3 = public_path('upload/product/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                Image::make($image->getRealPath())->resize(200, 300)->save($path3);
                
                $data[] = $name;
            }
            $product= new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->user_id = Auth::id();
            $product->qty = $request->qty;
            $product->status = $request->status;
            $product->sale = $request->sale;
            $product->brand_id = $request->brand_id;
            $product->cat_id = $request->cat_id;
            $product->img=json_encode($data);
            $product->save();
            return back()->with('success', 'Your product has been added successfully');
        }else{
            return back()->with('msg', 'Not have image');
        }
    } 
    public function getEdit($id){
        $item = Product::find($id);
        return view('frontend.account.product.edit',compact('item'));
    }
    public function postEdit($id,ProductEditRequest $req){
        //dd($req);

        $item = Product::find($id);
        $images = json_decode($item->img,true);

        if( $req->hasfile('img')){
            $count = count($images);
            if(isset($req->imgCheck)){
                $count = $count - count($req->imgCheck) + count($req->file('img'));
            }else{
                $count += count($req->file('img'));
            }
            if($count >3){
                return back()->with('msg', 'Vượt quá 3 ảnh cho 1 sản phẩm');
            }
        }
        $item->name= $req->name;
        $item->price= $req->price;
        $item->qty= $req->qty;
        $item->status= $req->status;
        if($req->sale == ''){
            $item->sale=0;
        }else{
            $item->sale= $req->sale;
        }
        $item->brand_id= $req->brand_id;
        $item->cat_id= $req->cat_id;
        

        if(isset($req->imgCheck)){
            //dd($req->imgCheck);
            
            foreach($req->imgCheck as $key=>$img){
                if(in_array($img,$images)){
                   $images= array_diff($images, [$img]);

                   $path = public_path('upload/product/' . $img);
                    if (file_exists($path)){
                    unlink(public_path('upload/product/' . $img));
                    unlink(public_path('upload/product/2' . $img));
                    unlink(public_path('upload/product/3' . $img));
                    }
                }
            }
        }
         if($req->hasfile('img'))
        {
            foreach($req->file('img') as $image)
            {
                $name = rand(0,100).$image->getClientOriginalName();
                $name_2 = "2".$name;
                $name_3 = "3".$name;

                //$image->move('upload/product/', $name);
                
                $path = public_path('upload/product/' . $name);
                $path2 = public_path('upload/product/' . $name_2);
                $path3 = public_path('upload/product/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                Image::make($image->getRealPath())->resize(200, 300)->save($path3);

                $images[]=$name;
                
            }
        }
        $images = array_values($images);
        $item->img=json_encode($images);
        //dd($images);
        $item->save();
        return redirect()->route('frontend.account.product')->with('success','Update successfully');
    }
    public function del($id){
        $item = Product::find($id);
        $images = json_decode($item->img,true);
        foreach ($images as $key => $img) {
            $path = public_path('upload/product/' . $img);
            if (file_exists($path)){
                unlink(public_path('upload/product/' . $img));
                unlink(public_path('upload/product/2' . $img));
                unlink(public_path('upload/product/3' . $img));
            }
        }
        
        $item->delete();
        return redirect()->route('frontend.account.product')->with('success','Delelte successfully');

    }
    public function index(){
        $items = Product::orderBy('id', 'desc')->limit(6)->get();
        //dd($items);
        return view('frontend.shop.index',compact('items'));
    }
    public function detail($id){
         return view('frontend.shop.detail');
    }
}
