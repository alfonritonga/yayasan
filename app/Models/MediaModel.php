<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MediaModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'medias';
    protected $fillable = [
        'guid',
        'type',
        'title',
        'description',
        'media',
        'user_id',
        'status'
    ];

    function admin()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
