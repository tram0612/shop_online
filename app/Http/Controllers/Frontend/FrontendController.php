<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MemberLoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddMemberRequest;
use App\User ;
class FrontendController extends Controller
{
	public function __construct(User $user){
		$this->user = $user;
	}
	public function index(){
    	return view('frontend.layouts.index');
    }
    public function logout(){
    	Auth::logout();
    	return redirect()->route('frontend.login');
    }
    public function getLogin(){
    	return view('frontend.login');
    }
    public function postLogin(MemberLoginRequest $req){
    	//dd($req);
    	$login = [
    		'email'=> $req->email,
    		'password' => $req->password,
    		'level' => 0
    	];
    	$remember_me = false;
    	if($req->remember_me){
    		$remember_me = true;
    	}
    	if(Auth::attempt($login, $remember_me)){
    		return redirect()->route('frontend.index');
    	}else{
    		return redirect()->back()->withErrors('Email or password is uncorrect');
    	}

    }
    public function getRegister(){
    	return view('frontend.register');
    }
    public function postRegister(AddMemberRequest $req){
    	$this->user->add($req);
        return redirect()->route('frontend.login');
    }
}
