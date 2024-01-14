<?php

namespace App\Modules\ComplainSuggestion\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainSuggestion extends Model
{
    use HasFactory;

    protected $table = 'complain_suggestion';

    protected $fillable = [
        'title',
        'mail',
        'phone_no',
        'com_sugg_desc',
        'admin_status',
        'user_status',
        'created_from',
        'created_for',
        'notice_for_all',
        'created_by',
        'deleted_by',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
