<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\User;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
    // public function profile()
    // {
    //     $user = Auth::user();
    //     //dd($user);
       
    //     $countrys = Country::all();
    //     return view('admin.user.profile',compact('user','countrys'));
    // }
    public function blog()
    {
        return view('admin.blog.index');
    }
    public function user()
    {
        return view('admin.user.index');
    }
    //  public function country()
    // {
    //     return view('admin.country.add');
    // }


}
