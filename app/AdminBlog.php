<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminBlog extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comment(){
        return $this->hasMany(Comment::class,'blog_id');
    }

    public function blogCat(){
        return $this->hasMany(BlogPostCategory::class,'blog_id');
    }

//    public function blogCategory(){
//        return $this->belongsTo('App\BlogPostCategory');
//    }
}
