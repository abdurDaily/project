<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSubCategory extends Model
{
    use HasFactory;
    
    public function CategoryBlog(){
        return $this->belongsTo(BlogCategory::class, 'blog_sub_categorie_id');
    }
}