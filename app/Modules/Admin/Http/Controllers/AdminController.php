<?php

namespace App\Modules\Admin\Http\Controllers;

use App\AppConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Order\Models\OrderHead;
use App\Modules\Product\Models\Product;
use App\Modules\Order\Models\OrderTransaction;
use App\Modules\Seller\Models\Seller;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;

use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::guard()->user();
        $pageTitle = 'Admin Dashboard';

        // Total order placed
        // $total_order=OrderHead::count();

        // Total order placed
        $total_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->count();

        // Total order cancel
        $total_order_cancel = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->where('order_details.status', 'cancel')->count();

        // Total order pending
        $total_pending_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->where('order_details.status', 'active')->count();

        // Total order confirmed
        $total_confirmed_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->where('order_details.status', 'confirmed')->count();

        // Total order shipped
        $total_shipped_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->where('order_details.status', 'processing')->count();

        // Total order delivered
        $total_delivered_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->where('order_details.status', 'delivered')->count();


        // Latest order list
        $order_data = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->orderBy('order_head.id', 'desc')->paginate(30);

        $total_product = Product::whereNotIn('status', ['Cancel', ''])->count();
        $total_pending_product = Product::where('status', 'inactive')->count();

        $total_customer = User::whereNotIn('status', ['Cancel', ''])->where('type', 'customer')->count();
        $total_shop = User::whereNotIn('status', ['Cancel', ''])->where('type', 'seller')->count();

        $total_payment_cancel = OrderTransaction::where('status', 'cancel')->count();
        $total_payment_pending = OrderTransaction::where('status', 'inactive')->count();
        $total_payment_receive = OrderTransaction::where('status', 'active')->count();

        // total pending seller
        $total_pending_seller = User::where('type', 'seller')->where('status', 'pending')
            ->count();
        //dd($total_pending_seller);

        return view("Admin::dashboard.index", compact(
            'admin', 'pageTitle', 'total_order', 'total_order_cancel',
            'total_pending_order', 'total_confirmed_order', 'total_shipped_order',
            'total_delivered_order', 'order_data', 'total_product', 'total_pending_product',
            'total_customer', 'total_shop', 'total_payment_cancel', 'total_payment_pending',
            'total_payment_receive', 'total_pending_seller'));
    }

    public function pendingSeller()
    {
        $admin = Auth::guard()->user();
        $data = User::select()
            ->with(['relMerchantProfile' => function ($query) {
                return $query->select(['id', 'user_id', 'shop_name', 'shop_address', 'nid_number', 'tin_no', 'shop_address']);
            }])
            ->with(['relMerchantVerification' => function ($query) {
                return $query->select(['user_id', 'seller_profile_id', 'completion', 'created_at']);
            }])
            ->with(['relMerchantDocuments' => function ($query) {
                return $query->select([
                    'seller_verification_document_setting_id', 'document_name', 'document', 'verification_status',
                    'send_back_massage', 'created_at', 'updated_at']);
            }])
            // ->with(['orderInfo' => function ($query) {
            //     return $query->select([
            //         'id', 'users_id', 'order_number'
            //     ]);
            // }])
            ->where('users.type', 'seller')
            ->where('users.status', 'pending')

        ->paginate(AppConfig::PER_PAGE_RECORDS)
            //->toArray()
        ;
        // dd($data);
        $pageTitle = 'Pending Seller List';
        return view("Admin::seller.index", compact(
            'admin', 'pageTitle','data'));
    }


    /**
     * change to verification status
     */
    public function verifiedStatus(Request $request, $id)
    {
        $admin = Auth::guard()->user();

        $user = User::where('id', $id)->first();

        if ($user) {
            $user->status = 'active'; 
            $user->updated_by = $admin->id; 
            $user->save();
            
            Mail::to($user->email)->send(new VerificationEmail($user));

            return redirect()->back()->with('success', 'User status updated successfully!');
        }

        return redirect()->back()->with('error', 'User not found!');

    }

    /**
     * change to Cancel status
     */
    public function cancelStatus(Request $request, $id)
    {
        $admin = Auth::guard()->user();

        $user = User::where('id', $id)->first();

        if ($user) {
            $user->status = 'cancel'; 
            $user->updated_by = $admin->id; 
            $user->save();
            return redirect()->back()->with('success', 'User status updated successfully!');
        }

        return redirect()->back()->with('error', 'User not found!');

    }

    /**
     * change to seller Details
    */
    public function getSellerDetails(Request $request, $id)
    {
        $seller = Seller::find($id);
        if ($seller) {
            return response()->json(['data' => $seller]);
        } else {
            return response()->json(['error' => 'Seller not found'], 404);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/admin-login');
    }

}
