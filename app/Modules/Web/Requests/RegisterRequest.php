<?php

namespace App\Modules\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RegisterRequest extends FormRequest
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
            'username'   => 'required|string',
            'email'   => 'string|email:rfc,dns',
            'mobile_no'   => 'required|numeric|unique:users',
            'password'   => 'required|confirmed',
            'password_confirmation'   => 'required',
            // 'mathcaptcha' => 'required|mathcaptcha',
        ];
    }


}