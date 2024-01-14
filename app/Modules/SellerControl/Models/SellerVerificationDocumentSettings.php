<?php

namespace App\Modules\SellerControl\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerVerificationDocumentSettings extends Model
{
    use HasFactory;

    protected $table='seller_verification_document_settings';
    
    protected $fillable = [
        'label',
        'name',
        'slug',
        'document_type', 
        'size_in_kb', 
        'required',
        'display',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

}
