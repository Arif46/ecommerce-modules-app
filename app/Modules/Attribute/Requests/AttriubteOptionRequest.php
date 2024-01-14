<?php

namespace App\Modules\Attribute\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttriubteOptionRequest extends FormRequest
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
                'frontend_title' => 'required|max:64',
                'backend_title' => 'required|max:64',
                'slug' => 'required|max:32',
                'status' => 'required',
            ];

    }

}