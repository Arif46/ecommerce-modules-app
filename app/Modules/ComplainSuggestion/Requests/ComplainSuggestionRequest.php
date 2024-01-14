<?php

namespace App\Modules\ComplainSuggestion\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ComplainSuggestionRequest extends FormRequest
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
            'title'   => 'required',
            'com_sugg_desc'   => 'required',
        ];

    }

}