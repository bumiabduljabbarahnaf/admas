<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminDetails extends Model
{
    protected $table    = 'admin_details';
    protected $fillable = ['id', 'admin_id', 'nama', 'email', 'photo', 'no_telp', 'created_at', 'updated_at'];
}
