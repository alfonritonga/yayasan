<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementProgramModel extends Model
{
    use HasFactory;
    protected $table = 'achievement_programs';
    protected $guarded = [];
    public $timestamps = false;
}
