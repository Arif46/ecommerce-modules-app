<?php

namespace App\Modules\SellerControl\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerVerifications extends Model
{
    use HasFactory;

    protected $table='seller_verifications';
    
    protected $fillable = [
        'user_id',
        'seller_profile_id', 
        'completion',
        'created_at',
        'updated_at'
    ];
}
