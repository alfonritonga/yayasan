<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PartnerListModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'list_partners';
    protected $fillable = [
        'title',
        'description',
        'media',
        'partner_id'
    ];

    function admin()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function category()
    {
        return $this->belongsTo(PartnerModel::class, 'partner_id', 'id')->withTrashed();
    }
}
