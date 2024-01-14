<?php

namespace App\Modules\SellerControl\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SettingsRequest extends FormRequest
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
            'label'   => 'required|max:32',
            'slug' => 'required|max:32|unique:seller_verification_document_settings,id,' . $this->get('id'),
        ];

    }

}