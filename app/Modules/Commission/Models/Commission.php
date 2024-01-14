<?php

namespace App\Modules\Commission\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $table = 'commissions';

    protected $fillable = [
        'title',
        'slug',
        'title_bn',
        'title_hi',
        'title_ch',
        'percentage',
        'note',
        'note_bn',
        'note_hi',
        'note_ch',
        'created_by',
        'updated_by'
    ];

    public static function getCommissionList(){
        $initial = [ '' => 'Select Commission'];
        $commission = Commission::pluck('title','id')->toArray();
        $data = ($initial + $commission);
        return $data;
    }

    public static function getCommissionListBn(){

        $initial = [ '' => 'কমিশন নির্বাচন করুন'];
        $commission = Commission::pluck('title_bn','id')->toArray();
        $data = ($initial + $commission);
        return $data;

        
    }

    public static function getCommissionListHi(){
         $initial = [ '' => 'आयोग का चयन करें'];
        $commission = Commission::pluck('title_hi','id')->toArray();
        $data = ($initial + $commission);
        return $data;
    }

    public static function getCommissionListCh(){
        $initial = [ '' => '選擇佣金'];
        $commission = Commission::pluck('title_ch','id')->toArray();
        $data = ($initial + $commission);
        return $data;
    }
}
