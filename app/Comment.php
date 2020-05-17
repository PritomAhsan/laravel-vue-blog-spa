<?php

namespace App;

use App\Http\Middleware\Admin;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function adminblog(){
        return $this->belongsTo(AdminBlog::class);
    }
}
