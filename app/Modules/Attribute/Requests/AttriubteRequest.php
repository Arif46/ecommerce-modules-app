<?php

namespace App\Modules\Attribute\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttriubteRequest extends FormRequest
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
                'code_column' => 'required|max:64|unique:attribute,id,' . $this->get('id'),
                'type' => 'required',
                'type_is_required' => 'required|max:16',
                'order' => 'required|max:11',
                'status' => 'required',
            ];

    }

}