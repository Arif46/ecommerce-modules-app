<?php

namespace App\Modules\Common\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
                
                'coupon_code' => 'required|max:255|unique:coupon,id,' . $this->get('id'),
                'coupon_name' => 'required',
                'coupon_details' => 'required',
                'status' => 'required',
                'amount' => 'required'
            ];

    }

}