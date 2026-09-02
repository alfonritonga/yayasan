<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UytWorkshopRegistration extends Model
{
    use HasFactory;

    protected $table = 'uyt_workshop_registrations';
    protected $guarded = ['id'];
}
