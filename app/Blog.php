<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = ['author','title','image','description','content','rate'];
    protected $primaryKey='id';
   	public $timestamps = true;
   	public function user()
    {
        return $this->belongsTo('App\User','author');
    }
    public function comment()
    {
    return $this->hasMany('App\Comment');
    }

    public function getItems(){
    	//return Blog::find(4);
    }
}
