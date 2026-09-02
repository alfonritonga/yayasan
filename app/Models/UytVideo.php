<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UytVideo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'uyt_videos';
    protected $fillable = [
        'guid',
        'title',
        'description',
        'media',
        'url_video',
        'user_id',
        'status'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
