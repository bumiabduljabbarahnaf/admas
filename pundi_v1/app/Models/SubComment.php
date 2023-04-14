<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model
use App\User;

class SubComment extends Model
{
    protected $table = 'sub_comments';
    protected $fillable = ['id', 'article_id', 'user_id', 'comment_id', 'content', 'status', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    public function article()
    {
        return $this->belongsTo(Articles::class, 'article_id');
    }
}
