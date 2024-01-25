<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementDonationModel extends Model
{
    use HasFactory;
    protected $table = 'achievement_donations';
    protected $guarded = [];
    public $timestamps = false;
}
