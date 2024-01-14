<?php

namespace App\Modules\Commission\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CommissionRequests extends FormRequest
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
            'title'   => 'required|max:32|unique:commissions,id,' . $this->get('id'),
            'percentage' => 'required|unique:commissions,id,' . $this->get('id'),
        ];

    }

}