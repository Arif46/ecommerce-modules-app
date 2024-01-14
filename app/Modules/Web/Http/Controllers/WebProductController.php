<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Web\Requests;
use App\Modules\Product\Models\VwProduct;
use App\Modules\Product\Models\ProductCategory;
use App\Modules\Product\Models\ProductReview;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App;
use Illuminate\Support\Facades\Redirect;


class WebProductController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $product_data = VwProduct::where('product_slug',$slug)->first();

        if(!empty($product_data)){
            // Page Title
            $pageTitle = $product_data->product_title;
            // shop list
            $shoplist = DB::table('vw_product')
                ->join('seller_profiles', 'vw_product.product_seller_id', '=', 'seller_profiles.users_id')
                ->where('product_slug',$slug)
                ->first();

            // find category in this product
            $product_category = ProductCategory::where('product_id', $product_data->product_id)->orderBy('category_id', 'desc')->get(['category_id'])->toArray();

            $size_color = App\Modules\Product\Models\ColorSizeWiseQuantity::leftjoin('color','color_size_wise_quantity.color_id', '=', 'color.id')
                ->leftjoin('size','color_size_wise_quantity.size_id', '=', 'size.id')
                ->where('product_id', $product_data->product_id)
                ->select('color_size_wise_quantity.id','size.title as size','color.title as color','color_size_wise_quantity.quantity')
                ->orderBy('color_size_wise_quantity.size_id', 'asc')->get();

            $stockData = App\Modules\Product\Models\ColorSizeWiseQuantity::where('product_id', $product_data->product_id)->sum('quantity');


            // related product
            $related_product_data = DB::table('vw_product')
                ->join('product_category', 'vw_product.product_id', '=', 'product_category.product_id')
                ->whereIn('product_category.category_id',$product_category)
                ->whereNotIn('vw_product.product_id', [$product_data->product_id])
                ->select('vw_product.*')
                ->inRandomOrder()
                ->orderBy('vw_product.product_id','desc')
                ->limit(4)
                ->get();

            // Coupon value
            $coupon_code = DB::table('coupon')->where('status','active')->select('coupon.coupon_code','coupon.amount','coupon.coupon_details','valid_from','valid_to')->first();

            $product_review = ProductReview::where('status','active')->where('product_id', $product_data->product_id)->orderBy('id','desc')->get();

            return view("Web::shop_details.index", compact(
                'pageTitle',
                'product_data',
                'related_product_data',
                'coupon_code',
                'product_review',
                'shoplist',
                'size_color',
                'stockData'
            ));

        }else{
            return redirect('/');
        }
    }


    public function product_review(Request $request) {
        $response = [];

        $input = $request->all();

        $data = $input['data'];

        $score = $data['0']['value'];
        $nickname = $data['1']['value'];
        $review_headline = $data['2']['value'];
        $review = $data['3']['value'];
        $product_id = $data['4']['value'];
        $product_slug = $data['5']['value'];

        /* Transaction Start Here */
        DB::beginTransaction();
        try {

            $model = new ProductReview();

            $model->product_id = $product_id;
            $model->rating_value_score = $score;
            $model->nickname = $nickname;
            $model->title = $review_headline;
            $model->review = $review;

            if(Auth::user()){
                $model->customer_id = Auth::user()->id;
            }

            $model->status = 'active';

            if(Auth::check() && Auth::user()->type == 'customer') {

                $model->save();
                DB::commit();
                $response['message'] = 'Thank you for your review';

            } else {
                $response['message'] = 'Please login to add your feedback.';
            }




        }catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            $error_info = $e->getMessage();
            $response['message'] = $error_info;
        }

        return $response;
    }

}