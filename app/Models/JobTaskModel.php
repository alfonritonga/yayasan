<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTaskModel extends Model
{
    use HasFactory;
    protected $table = 'job_tasks';
    protected $fillable  = [
        'jobs_id',
        'task',
    ];
}
