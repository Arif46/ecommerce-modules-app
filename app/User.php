<?php

namespace App;

use App\Modules\SellerControl\Models\SellerVerificationDocuments;
use App\Modules\SellerControl\Models\SellerVerifications;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Modules\Seller\Models\Seller;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
        'username',
        'mobile_no',
        'image',
        'type',
        'remember_token',
        'status'
    ];


    // Relations
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function relSellerProfile()
    {
        return $this->hasOne('App\Modules\Seller\Models\Seller', 'users_id', 'id');
    }

    // TODO :: boot
    // boot() function used to insert logged user_id at 'created_by' & 'updated_by'
    public static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            if (Auth::check()) {
                $query->created_by = @\Auth::user()->id;
            }
        });
        static::updating(function ($query) {
            if (Auth::check()) {
                $query->updated_by = @\Auth::user()->id;
            }
        });
    }

    /*merchant seller relation*/
    public function relMerchantProfile()
    {
        return $this->hasOne(Seller::class , 'user_id', 'id');
    }

    public function relMerchantVerification()
    {
        return $this->hasOne(SellerVerifications::class, 'user_id', 'id');
    }
    public function relMerchantDocuments()
    {
        return $this->hasMany(SellerVerificationDocuments::class, 'user_id', 'id');
    }

}
