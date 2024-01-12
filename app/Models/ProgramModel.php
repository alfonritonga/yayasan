<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'programs';
    protected $fillable = [
        'title',
        'description',
        'media'
    ];

    function admin()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function list()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
