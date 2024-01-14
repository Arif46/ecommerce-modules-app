<?php

namespace App\Modules\Attribute\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttriubteSetRequest extends FormRequest
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
                'title'   => 'required|max:64',
                'slug' => 'required|max:64|unique:attribute_set,id,' . $this->get('id'),
                'status' => 'required',
            ];

    }

}