<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['name','status','sale','user_id','cat_id','brand_id','price','qty','img'];
    protected $primaryKey='id';
   	public $timestamps = true;
   	public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','cat_id');
    }
     public function brand()
    {
        return $this->belongsTo('App\Brand','brand_id');
    }
}
