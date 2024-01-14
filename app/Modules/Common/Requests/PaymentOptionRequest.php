<?php

namespace App\Modules\Common\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentOptionRequest extends FormRequest
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
                
                'payment_type' => 'required|max:128|unique:payment_options,id,' . $this->get('id'),
              
            ];

    }

}