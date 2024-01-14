<?php

namespace App\Modules\Admanager\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdmanagerRequest extends FormRequest
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
                'title' => 'required|max:2400',
                'slug' => 'required|max:2400|unique:admanager,id,' . $this->get('id'),
                'image_link'   => 'image|mimes:jpeg,png,jpg,gif'.$image
                // 'caption' => 'required',
                // 'type'   => 'required|max:32',
                // 'position'   => 'required|max:32',
                // 'short_order' => 'required|max:11'
            ];

    }

}