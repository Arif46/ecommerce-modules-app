<?php

namespace App\Modules\Seller\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model {

    protected $table='seller_profiles';

    protected $fillable = [
        'user_id',
        'shop_name',
        'nid_number',
        'tin_no',
        'image_link',
        'shop_logo',
        'shop_address',
        'shop_description',
        'shop_agreement',
        'agreement_date',
        'agreement_details',
        'first_contact_person_details',
        'second_contact_person_details',
    ];

     public static function sellerList(){

        $initial = [ '' => 'Select Seller'];
        $seller = Seller::pluck('shop_name','users_id')->toArray();

        $data = ($initial + $seller);

        return $data;
    }

    public static function sellerListForCommonNotice(){

        $initial = [ '' => 'Select Seller', 'all' => 'For all seller (Common Notice)'];
        $seller = Seller::pluck('shop_name','users_id')->toArray();

        $data = ($initial + $seller);

        return $data;
    }

}
