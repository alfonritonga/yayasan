<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'donations';
    protected $fillable = [
        'guid',
        'name',
        'email',
        'phone',
        'nominal',
        'message'
    ];
}
