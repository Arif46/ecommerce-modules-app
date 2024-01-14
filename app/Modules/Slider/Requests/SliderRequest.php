<?php

namespace App\Modules\Slider\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SliderRequest extends FormRequest
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
                'title' => 'required|max:32',
                'slug' => 'required|max:32|unique:slider,id,' . $this->get('id'),
                'image_link'   => 'image|mimes:jpeg,png,jpg,gif|max:1024'.$image,
                'caption' => 'required|max:255',
                'type'   => 'required|max:32',
                'short_order' => 'required|max:11'
            ];

    }

}