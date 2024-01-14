<?php

namespace App\Modules\Cms\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CmsRequest extends FormRequest
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
                
                'title' => 'required|max:32|unique:cms,id,' . $this->get('id'),
              
            ];

    }

}