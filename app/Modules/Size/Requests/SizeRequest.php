<?php

namespace App\Modules\Size\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SizeRequest extends FormRequest
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
        //dd('ok');    
        $image = Request::input('image_link')?Request::input('image_link'):'';

        return [
            'title'   => 'required|max:32',
            'slug' => 'required|max:32|unique:size,id,' . $this->get('id'),
            'image_link'   => 'image|mimes:jpeg,png,jpg,gif'. $image,
        ];

    }

}