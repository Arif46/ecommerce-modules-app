<?php

namespace App\Modules\Seller\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ShopbannerRequest extends FormRequest
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
            
            'image_link'   => 'image|mimes:jpeg,png,jpg,gif'.$image          
           
        ];
    }


}