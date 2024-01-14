<?php

namespace App\Modules\Events\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EventsRequest extends FormRequest
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
                'title' => 'required|max:1024',
                'slug' => 'required|max:200|unique:events,id,' . $this->get('id'),
                'image_link'   => 'max:2024'.$image
                // 'caption' => 'required',
                // 'type'   => 'required|max:32',               
                // 'short_order' => 'required|max:11'
            ];

    }

}