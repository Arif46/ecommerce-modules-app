<?php

namespace App\Modules\SellerControl\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\This;

class SellerSignUpFormValidation
{
    static $validationMessage = [
        'password.regex'=>'Password format must contain at leas one lowercase,one uppercase and one digit.'
    ];

    static function validateForm(array $data, array $documentSetting): array
    {
        $status = [
            'is_valid' => true,
            'errors' => []
        ];
        $rules = self::formRulesWithoutFile();
        if (count($documentSetting)) {
            $rules = array_merge($rules, self::getFileUploadRules($documentSetting));
        }
        // dd($data);
        // dd($rules);


        $validator = Validator::make($data, $rules,self::$validationMessage);

        if (!$validator->passes()) {
            $status = [
                'is_valid' => false,
                'errors' => $validator->messages()
            ];
        }
        return $status;
    }

    static function formRulesWithoutFile(): array
    {
        return [
            'shop_name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'nid_number' => 'required|max:30|unique:seller_profiles',
            // 'email_address' => 'email|max:255|unique:users,email',
            'shop_address' => 'required|max:255',
            'mobile_number' => 'required',
            'tin_no' => 'required|integer',
            'password' => [
                'required',
                'string',
                'min:6',             // must be at least 6 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                //'regex:/[@$!%*#?&]/', // must contain a special character
                'confirmed'
            ]
        ];
    }

    static function getFileUploadRules($documentSetting): array
    {
        $uploadRules = [];
        foreach ($documentSetting as $singleSetting) {
            $uploadRules[$singleSetting['name']] = [];
            if ($singleSetting['required'] == 'required') {
                $uploadRules[$singleSetting['name']][] = 'required';
                //array_push(self::$validationMessage,);
                self::$validationMessage[$singleSetting['name'].'.required'] = $singleSetting['label'] .' document required';
            }
            $uploadRules[$singleSetting['name']][] = 'max:' . $singleSetting['size_in_kb'];
            $uploadRules[$singleSetting['name']][] = 'mimes:' . $singleSetting['document_type'];
        }
        return $uploadRules;
    }
}
