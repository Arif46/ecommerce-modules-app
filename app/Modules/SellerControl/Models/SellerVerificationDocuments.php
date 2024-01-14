<?php

namespace App\Modules\SellerControl\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerVerificationDocuments extends Model
{
    use HasFactory;

    protected $table = 'seller_verification_documents';

    protected $fillable = [
        'seller_verification_document_setting_id',
        'document_name',
        'document',
        'verification_status',
        'send_back_massage',
        'created_at',
        'updated_at'
    ];

}
