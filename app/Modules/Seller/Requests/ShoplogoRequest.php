<?php

namespace App\Modules\Seller\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ShoplogoRequest extends FormRequest
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
       
        $image = Request::input('shop_logo')?Request::input('shop_logo'):'';
        return [
            
          'shop_logo'   => 'image|mimes:jpeg,png,jpg,gif|max:100'.$image
           
        ];
    }


}