<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'articles';
    protected $fillable = [
        'guid',
        'title',
        'slug',
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
