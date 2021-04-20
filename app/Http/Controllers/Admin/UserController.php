<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Country;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
	public function getProfile()
    {
        $user = Auth::user();
        //dd($user);
       
        
        return view('admin.user.profile',compact('user'));
    }
    public function postProfile(UpdateProfileRequest $req){
    	// dd('aaaaaaaaaa0');
    	//dd($req);
    	$id = Auth::id();
    	$user = User::find($id);
    	//dd($user);
    	$user->name = $req->name;
    	$user->email = $req->email;
    	if($req->password != null){
    		$user->password = bcrypt($req->password);
    	}
    	if($req->address != null){
    		$user->address = $req->address;
    	}
    	if($req->phone != null){
    		$user->phone = $req->phone;
    	}
    	$user->id_country = $req->id_country;
    	// "Code xư lý upload file:
     	if ($req->hasFile('avarta')) {
           	if (file_exists( 'upload/user/avatar/' .$user->avarta)){
           		unlink('upload/user/avatar/' .$user->avarta);
           	}
            $file = $req->avarta;
            $user->avarta = $file->getClientOriginalName();
            $file->move('upload/user/avatar', $file->getClientOriginalName());


        }

        $user->save();
        return redirect()->back();
    }
}
// "Code tham khao update profile:
// public function update(UpdateProfileRequest $request)
//     {
//         $userId = Auth::id();
//         $user = User::findOrFail($userId);

//         $data = $request->all();
//         $file = $request->avatar;
//         if(!empty($file)){
//             $data['avatar'] = $file->getClientOriginalName();
//         }
        
//         if ($data['password']) {
//             $data['password'] = bcrypt($data['password']);
//         }else{
//             $data['password'] = $user->password;
//         }
       
//         if ($user->update($data)) {
//             if(!empty($file)){
//                 $file->move('upload/user/avatar', $file->getClientOriginalName());
//             }
//             return redirect()->back()->with('success', __('Update profile success.'));
//         } else {
//             return redirect()->back()->withErrors('Update profile error.');
//         }

//     }

// "								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								