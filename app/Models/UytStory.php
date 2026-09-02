<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UytStory extends Model
{
    use HasFactory;

    protected $table = 'uyt_stories';
    protected $guarded = ['id'];
}
