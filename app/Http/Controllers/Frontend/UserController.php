<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateProfileRequest;
class UserController extends Controller
{
	public function __construct(User $user){
		$this->user = $user;
	}
    public function profile(){
    	return view('frontend.account.profile');
    }
    public function edit(UpdateProfileRequest $req){
    	$this->user->postProfile($req);
    	return redirect()->back();
    }
}
