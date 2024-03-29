<?php

namespace App\Modules\Common\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FaqRequest extends FormRequest
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
            $image = Request::input('image_link')?Request::input('image_link'):'';
            return [
                
                'title' => 'required|max:32|unique:faq,id,' . $this->get('id'),
                'image_link'   => 'image|mimes:jpeg,png,jpg,gif|max:1024'.$image,
              
            ];

    }

}