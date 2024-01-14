<?php

namespace App\Modules\AdminSellerPayment\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\AdminSellerPayment\Models\AdminSellerPayment;
use App\Modules\Seller\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Helpers\GlobalFileUploadFunctoin;

class AdminSellerPaymentController extends Controller
{
    /**
     * @return bool
     */
    protected function isGetRequest($requestMethod){
        return $requestMethod == "GET";
    }


    /**
     * @return bool
     */
    protected function isPostRequest($requestMethod){
        return $requestMethod == "POST";
    }

    protected $received_copy_image_path;
    protected $received_copy_image_relative_path;

    /**
     * BrandController constructor.
     */
    public function __construct()
    {
        $this->received_copy_image_path = public_path('uploads/admin-seller-payment/received-copy');
        $this->received_copy_image_relative_path = '/uploads/admin-seller-payment/received-copy';
    }

    protected static function array_of_size()
    {
        $array_of_size = array(
            'orginal_image',
            '800'
        );

        return $array_of_size;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "List of AdminSellerPayment";

        // Get AdminSellerPayment data
        $data = AdminSellerPayment:: select('admin_seller_payments.*')
            ->orderBy('id', 'desc')
            ->paginate(30);

        // return view
        return view("AdminSellerPayment::adminsellerpayments.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New AdminSellerPayment";
        $sellerList = Seller::sellerList(); 
        $adminList = [Auth::user()->id => Auth::user()->username];

        return view("AdminSellerPayment::adminsellerpayments.create", compact('sellerList','adminList','pageTitle'));

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function store(Request $request)
    {

        $input = $request->all(); 
        $lastId = AdminSellerPayment::select('id')->max('id');
        $receivedNo = ($lastId + 1);
        if($receivedNo < 10){
            $receivedNo = 'AMBDRE-00'.$receivedNo;
        }
        elseif(10 < $receivedNo && $receivedNo < 100){
            $receivedNo = 'AMBDRE-0'.$receivedNo;
        }
        else{
          $receivedNo = 'AMBDRE-'.$receivedNo;  
        }

        // Check image file exists or not
        if($request->hasfile('image_link')){
            // Image link
            $receivedCopyImg = $request->file('image_link');
            if(!empty($receivedCopyImg)) {
               
            $file_path      = 'received-copy';
            $attachment     =  $request->file('image_link');

            $attachment_name = GlobalFileUploadFunctoin::file_validation_and_return_file_name($request, $file_path,'image_link');
            GlobalFileUploadFunctoin::file_upload($request, $file_path, 'image_link', $attachment_name);

            }
        }

        try {
          
            $model = new AdminSellerPayment();
            $model->seller_id = $request->seller_id;
            $model->admin_id = $request->admin_id;
            $model->amount = $request->amount;
            $model->pay_by = $request->pay_by;
            $model->received_no = $receivedNo ?? null;
            $model->special_instruction = $request->special_instruction?? null;
            $model->admin_note = $request->admin_note?? null;
            $model->admin_note_bn = $request->admin_note_bn?? null;
            $model->admin_note_hi = $request->admin_note_hi ?? null;
            $model->admin_note_ch = $request->admin_note_ch?? null;
            $model->seller_note = $request->seller_note?? null;
            $model->seller_note_bn = $request->seller_note_bn?? null;
            $model->seller_note_hi = $request->seller_note_hi?? null;
            $model->seller_note_ch = $request->seller_note_ch?? null;
            $model->received_copy = $attachment_name?? null;
            $model->transaction_id = $request->transaction_id?? null;
            $model->approve_or_reject = $request->approve_or_reject ?? 3;
            $model->approve_or_reject_note = $request->approve_or_reject_note?? null;
            $model->approve_or_reject_note_bn = $request->approve_or_reject_note_bn?? null;
            $model->approve_or_reject_note_hi = $request->approve_or_reject_note_hi?? null;
            $model->approve_or_reject_note_ch = $request->approve_or_reject_note_ch?? null;
            $model->payment_date = $request->payment_date?? null;
            $model->created_by = $request->created_by?? null;
            $model->updated_by = $request->updated_by?? null;
            
            $model->save();



            Session::flash('message', 'successfully added');
            return redirect('admin-seller-payment-index');

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            Session::flash('danger', $e->getMessage());
        }

        
        return redirect()->back();



    }

    public function show($id)
    {

        $pageTitle = 'View AdminSellerPayment Informations';

        // Find AdminSellerPayment data
        $data = AdminSellerPayment::where('admin_seller_payments.id', $id)
            ->select('admin_seller_payments.*')
            ->first();

        if(!empty($data))
        {
            // If found AdminSellerPayment
            return view("AdminSellerPayment::adminsellerpayments.show", compact('data','pageTitle'));

        }else{
            // If AdminSellerPayment not found
            return redirect()->back();

        }



    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = "Update AdminSellerPayment";

        // Find AdminSellerPayment
        $data = AdminSellerPayment::where('admin_seller_payments.id', $id)
            ->select('admin_seller_payments.*')
            ->first();


        $sellerList = Seller::sellerList(); 
        $adminList = [Auth::user()->id => Auth::user()->username];

        // If AdminSellerPayment not found
        if(empty($data)){
            Session::flash('danger', 'AdminSellerPayment not found.');
            return redirect()->route('admin.AdminSellerPayment.index');
        }

        return view("AdminSellerPayment::adminsellerpayments.edit", compact('data','pageTitle','sellerList','adminList',));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $input = $request->all();

        // Find catgory
        $model = AdminSellerPayment::where('admin_seller_payments.id', $id)
            ->select('admin_seller_payments.*')
            ->first();

        // Check image file exists or not
        if($request->hasfile('image_link')){

              $receivedCopyImg = $request->file('image_link');
            if(!empty($receivedCopyImg)) {
               
            $file_path      = 'received-copy';
            $attachment     =  $request->file('image_link');

            $attachment_name = GlobalFileUploadFunctoin::file_validation_and_return_file_name($request, $file_path,'image_link');

            $old_file_name = $model->attachment_name;
GlobalFileUploadFunctoin::file_upload($request, $file_path, 'image_link', $attachment_name, $old_file_name);
            
            $input['received_copy'] = $attachment_name;

            }            

        }

        try {
            // Update AdminSellerPayment
            $result = $model->update($input);

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-seller-payment-index');
        }
        catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find AdminSellerPayment

        $model = AdminSellerPayment::where('brands.id', $id)
            ->select('brands.*')
            ->first();

        DB::beginTransaction();
        try {
            // AdminSellerPayment update
            if($model->status =='active'){
                $model->status = 'cancel';
            }else{
                $model->status = 'active';
            }

            $model->save();

            DB::commit();
            Session::flash('message', "Successfully Cancel.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }

        // redirect to current page
        return redirect()->back();
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $pageTitle = 'Category Information';

        // Category model initialize
        $model = new AdminSellerPayment();

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->search_keywords);
            $model = $model->where(function ($query) use($search_keywords){
                $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('brands.status', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('description', 'LIKE', '%'.$search_keywords.'%');
            });
            $data = $model->select('brands.*')->paginate(30);
        }else{

            // If get data not found
            $data = AdminSellerPayment::select('brands.*')
                ->paginate(30);
        }

        // Return view
        return view("AdminSellerPayment::adminsellerpayments.index", compact('data','pageTitle'));
    }

}
