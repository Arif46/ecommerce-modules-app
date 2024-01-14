<?php

namespace App\Modules\Common\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingOptionRequest extends FormRequest
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
                
                'shipping_type' => 'required|max:255|unique:shipping_method,id,' . $this->get('id'),
                'shipping_value' => 'required|max:255',
                'conditional' => 'required|max:255',                
                'courier_service' => 'required:max:255',
                'status' => 'required'              
            ];

    }

}