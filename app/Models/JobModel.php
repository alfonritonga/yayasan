<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'jobs';
    protected $fillable = [
        'guid',
        'title',
        'description',
        'media',
        'user_id',
        'status',
        'from',
        'to',
    ];

    function admin()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
