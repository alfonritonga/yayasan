<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PartnerModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'partners';
    protected $fillable = [
        'title',
        'description'
    ];

    function admin()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function lists()
    {
        return $this->hasMany(PartnerListModel::class, 'partner_id', 'id');
    }
}
