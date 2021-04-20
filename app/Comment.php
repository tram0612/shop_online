<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['cmt','user_id','blog_id','parent_id'];
    protected $primaryKey='id';
   	public $timestamps = true;
   	public function user()
    {
    return $this->belongsTo('App\User');
    }
 
    public function blog()
    {
        return $this->belongsTo('App\Post');
    }
    
   public function childrenComments()
   {
       return $this->hasMany(Comment::class,'parent_id')->with('childrenComments')->with('user');
   }


}
