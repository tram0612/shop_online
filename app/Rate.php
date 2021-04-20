<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rate';
    protected $fillable = ['value','user_id','blog_id'];
    protected $primaryKey='id';
   	public $timestamps = true;
   	// public function user()
    // {
    //     return $this->hasOne('App\User','user_id');
    // }
    // public function blog()
    // {
    //     return $this->hasOne('App\User','blog_id');
    // }

}
