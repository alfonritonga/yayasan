<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UytArticle extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'uyt_articles';
    protected $fillable = [
        'guid',
        'title',
        'slug',
        'description',
        'media',
        'user_id',
        'status'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
