<?php

namespace App\Modules\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditInformationRequest extends FormRequest
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
            'username'   => 'string',
            'mobile_no'   => 'required|numeric|unique:users,id,'. $this->id
            // 'email'   => 'email|unique:users,id,'. $this->id
        ];
    }


}