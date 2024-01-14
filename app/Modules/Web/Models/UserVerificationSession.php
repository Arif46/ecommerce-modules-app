<?php

namespace App\Modules\Web\Models;

use App\AppConfig;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class UserVerificationSession extends Model
{

    protected $table = 'user_verification_sessions';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'uuid', 'name', 'email', 'mobile_no', 'user_id', 'verification_key', 'otp', 'session_time', 'expire_at',
        'verification_type', 'user_type', 'verification_purpose', 'password', 'verification_mode', 'created_at'
    ];
    public const UPDATED_AT = null;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
//            if (Auth::check()) {
                $query->uuid = Uuid::uuid1();
                $query->session_time = AppConfig::VERIFICATION_SESSION_TIME;
                $now = Carbon::now();
                $query->expire_at = $now->addSeconds(AppConfig::VERIFICATION_SESSION_TIME);
//            }
        });
    }

    public static function generateUniqueKey()
    {
        return Str::random(64);
    }

    public static function generateUniqueOTP()
    {
        return rand(100000, 999999);
    }

    public function checkSessionByKey($key)
    {
        return DB::table($this->getTable())
            ->where('verification_key', '=', $key)
            ->where('expire_at', '>', Carbon::now())
            ->first();
    }

    public function checkSessionByMobileOTP($mobile, $otp)
    {
        return DB::table($this->getTable())
            ->where('mobile_no', '=', $mobile)
            ->where('otp', '=', $otp)
            ->where('expire_at', '>', Carbon::now())
            ->first();
    }

    public function checkSessionByEmailOTP($email, $otp)
    {
        return DB::table($this->getTable())
            ->where('email', '=', $email)
            ->where('otp', '=', $otp)
            ->where('expire_at', '>', Carbon::now())
            ->first();
    }

    public function deleteSession($sessionId)
    {
        return DB::table($this->getTable())->where('uuid', '=', $sessionId)->delete();
    }


}
