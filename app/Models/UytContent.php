<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UytContent extends Model
{
    use HasFactory;

    protected $table = 'uyt_contents';
    protected $guarded = ['id'];
}
