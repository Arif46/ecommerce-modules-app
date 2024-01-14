<?php

namespace App\Modules\SellerControl\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Seller\Models\Seller;
use App\Modules\SellerControl\Models\CreateSellerVerificationDocuments;
use App\Modules\SellerControl\Models\SellerVerificationDocuments;
use App\Modules\SellerControl\Models\SellerVerificationDocumentSettings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class SellerSignUpController extends Controller
{

    public function sellerSignUp()
    {
        return view("SellerControl::signup.signupForm")
            ->with('documents', $this->getLoadableDocuments()->toArray());
    }

    public function sellerSignUpStore(Request $request)
    {
        $documentSetting = $this->getLoadableDocuments()->toArray();
        //$sellerData = $request->only('username', 'email_address', 'password', 'password_confirmation', 'mobile_number');
        $validationStatus = SellerSignUpFormValidation::validateForm($request->all(), $documentSetting);
        if (!$validationStatus['is_valid']) {
            //print_r( $validationStatus['errors']);
            return Response::json(['errors' => $validationStatus['errors']], 422); // Status code here
        }
        DB::beginTransaction();
        try {
            $userObj = $this->createUserProfileForSeller($request);
            $userObj->save();
            $sellerObj = $this->createSellerProfile($userObj->id, $request);
            $sellerObj->save();
            $documentsUploaded = SellerSignUpFileUpload::uploadFormFiles( $documentSetting,$request->all(),$userObj->id);
            SellerVerificationDocuments::insert($documentsUploaded);
            DB::commit();
            $message = 'Your request has been accepted. You can login with the username or email and password you provided';
            return Response::json(['message' => $message], 200); // Status code here
        } catch (\Exception $e) {
            //dd($e->getFile());
            //dd($e->getLine());
            //dd($e->getMessage());
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }
    }

    protected function getLoadableDocuments()
    {
        return SellerVerificationDocumentSettings::where('display', '=', 'required')->get();
    }

    protected function createSellerProfile($user_id, Request $request): Seller
    {
        $sellerObj = new Seller();
        $sellerObj->user_id = $user_id;
        $sellerObj->shop_name = $request->shop_name;
        $sellerObj->shop_address = $request->shop_address;
        $sellerObj->nid_number = $request->nid_number;
        $sellerObj->tin_no = $request->tin_no;
        return $sellerObj;
    }


    protected function createUserProfileForSeller(Request $request): User
    {
        $userObj = new User();
        $userObj->email = $request->email_address;
        $userObj->password = Hash::make($request->password);
        $userObj->mobile_no = $request->mobile_number;
        $userObj->username = $request->username;
        $userObj->type = 'seller';
        $userObj->status = 'pending';
        return $userObj;
    }
}
