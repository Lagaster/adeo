<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'body',
        'image',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function blog_image(){
        return $this->image == 'default_blog.png' ? asset('admin_asset/images/default_blog.png') : asset('storage/images/blogs/'.$this->image);
    }
    
}
