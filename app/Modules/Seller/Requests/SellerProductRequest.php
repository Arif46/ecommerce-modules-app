<?php

namespace App\Modules\Seller\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SellerProductRequest extends FormRequest
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
            $image = Request::input('image')?Request::input('image'):'';
            return [
                'attribute_set_id' => 'required',
                'type' => 'required',
                'status' => 'required',
                'image'   => 'image|mimes:jpeg,png,jpg,gif'.$image,
            ];

    }


}