<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingInfoModel extends Model
{
    use HasFactory;
    protected $table = 'landing_info';
    protected $fillable = [
        'description',
        'history',
        'visi_mission',
        'partnership',
    ];
}
