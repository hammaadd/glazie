<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    use HasFactory,softDeletes;
    public function likes()
    {
        return $this->hasMany(BlogLikes::class, 'blog_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id', 'id');
    }
}
