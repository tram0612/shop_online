<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    protected $fillable = ['name'];
    protected $primaryKey='id';
   	public $timestamps = false;
   	// public function users()
    // {
    //     return $this->hasMany('App\User');
    // }
}