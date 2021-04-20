<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     protected $table = 'brand';
    protected $fillable = ['name'];
    protected $primaryKey='id';
   	public $timestamps = false;
     public function product()
    {
    return $this->hasMany('App\Product');
    }
}
