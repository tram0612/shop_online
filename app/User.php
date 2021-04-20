<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','id_country','avarta','level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function country()
    // {
    //     return $this->belongsto('App\Country', 'id_country');
    // }
    protected $primaryKey='id';
    public $timestamps = false;
    public function blog()
    {
        return $this->hasMany('App\Blog');
    }
    public function add($req){
        //dd($req);
        $img = '';
        if ($req->hasFile('avarta')) {
            $file = $req->avarta;
            $img = $file->getClientOriginalName();
            $file->move('upload/user/avatar', $img);

        }
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone' =>$req->phone,
            'address' =>$req->address,
            'id_country' => $req->id_country,
            'avarta'=> $img,
            'level' => 0,

        ]);
        $user->save();
    }
    public function postProfile($req){
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
