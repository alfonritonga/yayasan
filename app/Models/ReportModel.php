<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'reports';
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];
}
