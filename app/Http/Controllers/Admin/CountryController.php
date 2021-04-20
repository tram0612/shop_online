<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
class CountryController extends Controller
{
	public function index(){
		$items = Country::all();
		return view('admin.country.index',compact('items'));
	}
	public function getAdd(){
		return view('admin.country.add');
	}
    public function postAdd(Request $req){
    	$c = new Country();
    	$c->name = $req->name;
    	$c->save();
    	return redirect()->back();
    }
}
