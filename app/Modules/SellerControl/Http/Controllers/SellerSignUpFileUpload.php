<?php

namespace App\Modules\SellerControl\Http\Controllers;

use App\AppConfig;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerSignUpFileUpload
{

    static function uploadFormFiles($documentSetting, $requestedData,$user_id = null): array
    {
       // dd($requestedData);
        $insertableRecords = [];
        foreach ($documentSetting as $document) {
            if (array_key_exists($document['name'],$requestedData)) {
                $uploadedFileName = self::upload(AppConfig::SELLER_DOCUMENT_UPLOAD, $requestedData[$document['name']]);
                $row['seller_verification_document_setting_id'] = $document['id'];
                $row['user_id'] = $document['id'];
                $row['document_name'] = $document['name'];
                $row['document'] = $uploadedFileName;
                array_push($insertableRecords,$row);
            }
        }
        return $insertableRecords;
    }

    static function renameFileBeforeUpload($fileName, $id=0): string
    {
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        return md5($fileName . microtime()) . ($id + 1) . '.' . $extension;
    }

    static function upload($path, $fileName, $id = 0)
    {
        $originalName = $fileName->getClientOriginalName();
        $modifiedName = self::renameFileBeforeUpload($originalName, $id);
        if ($fileName->storeAs($path, $modifiedName)) return $modifiedName;
        return false;
    }
}
