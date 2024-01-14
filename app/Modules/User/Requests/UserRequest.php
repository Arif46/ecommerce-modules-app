<?php

namespace App\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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
                'mobile_no' => 'required|unique:users,id,' . $this->get('id'),
                // 'username' => 'required|max:1200',
                'type' => 'required'
               
            ];

    }

}