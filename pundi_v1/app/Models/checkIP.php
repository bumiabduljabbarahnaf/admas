<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class checkIP extends Model
{
    protected $table = 'check_ip';
    protected $fillable = ['id', 'article_id', 'ip'];
}
