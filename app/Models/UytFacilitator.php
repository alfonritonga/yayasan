<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UytFacilitator extends Model
{
    use HasFactory;

    protected $table = 'uyt_facilitators';
    protected $guarded = ['id'];
}
