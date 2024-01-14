<?php

namespace App\Modules\Seller\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SellerRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shop_name'=> 'required|max:128',
            'mobile_no'=> 'required|max:15|unique:users',
            // 'email'=> 'email|unique:users',
            'password'=> 'required|confirmed',
            'password_confirmation'=> 'required'
        ];
    }


}