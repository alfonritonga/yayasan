<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramTaskModel extends Model
{
    use HasFactory;
    protected $table = 'program_tasks';
    public $timestamps = false;
    protected $fillable = [
        'programs_id',
        'task'
    ];
}
