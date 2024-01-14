<?php

namespace App\Modules\AdminSellerPayment\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSellerPayment extends Model
{
    use HasFactory;

    protected $table = 'admin_seller_payments';
    protected $fillable = [
        'seller_id',
        'admin_id',
        'amount',
        'pay_by',
        'special_instruction',
        'admin_note',
        'admin_note_bn',
        'admin_note_hi',
        'admin_note_ch',
        'seller_note',
        'seller_note_bn',
        'seller_note_hi',
        'seller_note_ch',
        'received_copy',
        'transaction_id',
        'approve_or_reject',
        'approve_or_reject_note',
        'approve_or_reject_note_bn',
        'approve_or_reject_note_hi',
        'approve_or_reject_note_ch',
        'payment_date',
        'created_by',
        'updated_by',
    ];
}



            
            