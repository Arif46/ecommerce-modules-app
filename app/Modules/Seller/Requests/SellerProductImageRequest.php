<?php

namespace App\Modules\Seller\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SellerProductImageRequest extends FormRequest
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
           $image = Request::input('file')?Request::input('file'):'';
            return [
                'image_link'   => 'image'.$image,
            ];

    }

}


