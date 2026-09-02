<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UytResource extends Model
{
    use HasFactory;

    protected $table = 'uyt_resources';
    protected $guarded = ['id'];
}
