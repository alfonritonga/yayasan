<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobQualificationModel extends Model
{
    use HasFactory;
    protected $table = 'job_qualifications';
    protected $fillable  = [
        'jobs_id',
        'qualification',
    ];
}
