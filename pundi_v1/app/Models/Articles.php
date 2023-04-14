<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model
use App\User;

class Articles extends Model
{
    protected $table    = 'articles';
    protected $fillable = ['id', 'category_id', 'sub_category_id', 'author_id', 'editor_id', 'title', 'title_slug', 'image', 'source_image', 'content', 'tag', 'views', 'status', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
