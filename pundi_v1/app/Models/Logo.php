<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table    = 'logo';
    protected $fillable = ['id', 'title', 'header', 'footer', 'preloader', 'share', 'tentang_kami', 'created_at', 'updated_at'];
}
