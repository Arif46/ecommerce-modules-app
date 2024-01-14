<?php

namespace App\Modules\SellerCommission\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SellerCommission extends Model
{
    use HasFactory;

    protected $table = 'seller_commissions';

    protected $fillable = [
        'title',
        'slug',
        'title_bn',
        'title_hi',
        'title_ch',
        'commission_id',
        'seller_id',
        'from_date',
        'to_date',
        'percentage',
        'note',
        'note_bn',
        'note_hi',
        'note_ch',
        'status',
        'created_by',
        'updated_by'
    ]; 

}
