<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementModel extends Model
{
    use HasFactory;
    protected $table = 'achievements';
    protected $guarded = [];

    function programs()
    {
        return $this->hasMany(AchievementProgramModel::class, 'achievements_id', 'id');
    }
}
