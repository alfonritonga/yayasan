<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspirationFigureModel extends Model
{
    use HasFactory;
    protected $table = 'inspiration_figures';
    protected $fillable = [
        'name',
        'description',
        'status',
        'media'
    ];
}
