<?php

namespace App\Modules\SellerCommission\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SellerCommissionRequests extends FormRequest
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
            'title'   			=> 'required',
            'seller_id'   		=> 'required',
            'commission_id'   	=> [
                             'required', 
                             Rule::unique('seller_commissions')
                                    ->where('seller_id', $this->seller_id)
                                    ->where('commission_id', $this->commission_id)
                                    ->where('status', 1)
                            ]
        ];

    }

}


