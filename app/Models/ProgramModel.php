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

    function tasks()
    {
        return $this->hasMany(ProgramTaskModel::class, 'programs_id', 'id');
    }
}
