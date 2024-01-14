<?php

namespace App\Modules\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LoginRequest extends FormRequest
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
            'email'   => 'string',
            'password_r'   => 'required',
            // 'mathcaptcha' => 'required|mathcaptcha',
        ];
    }


}