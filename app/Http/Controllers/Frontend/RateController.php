<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rate;
use App\Blog;
class RateController extends Controller
{
    public function __construct(Rate $rate)
    {
    	$this->rate = $rate;
    }
    public function rate(Request $req){
    	//echo 111;
    	$rateN = Rate::updateOrCreate(
		    ['user_id' =>  $req->user_id, 'blog_id' => $req->blog_id],
		    ['value' => $req->value]
		);
		$averageRate = Rate::Where('blog_id', $req->blog_id)->avg('value');
		$averageRate = round($averageRate, 1 , PHP_ROUND_HALF_UP);
		//dd($averageRate);
		$blog = Blog::find($req->blog_id);
		$blog->rate = $averageRate;
		$blog->save();
		$tc = 'Đánh giá thành công';
		return compact('tc');

    }

}
