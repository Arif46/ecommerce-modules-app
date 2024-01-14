<?php

namespace App\Modules\Color\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ColorRequest extends FormRequest
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
            'title'   => 'required|max:32',
            'slug' => 'required|max:32|unique:color,id,' . $this->get('id'),
            'image_link'   => 'image|mimes:jpeg,png,jpg,gif'. $image,
        ];

    }

}