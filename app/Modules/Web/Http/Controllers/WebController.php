<?php

namespace App\Modules\Web\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App;
use Illuminate\Support\Facades\Cache;

class WebController extends Controller
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
    public function index()
    {

        $current_date = Carbon::today()->subDays(400);

        // Slider data    
        $slider_data = DB::table('slider')
            ->where('slider.status', 'active')
            ->orderBy('ordering')
            ->limit(5)
            ->get();

        // Fastival Product
        $trending_product = DB::table('vw_product')
            ->where('type', 'configurable-product')
            // ->where('created_at','>=',$current_date)
            // ->orderBy('product_id','desc')
            ->limit(4)
            ->inRandomOrder()
            ->get();

        // Featured Product
        $featured_product = DB::table('vw_product')
            ->where('is_featured', 'yes')
            ->where('created_at', '>=', $current_date)
            // ->orderBy('product_id','desc')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        // New Arrivals Product
        $custome_product = DB::table('vw_product')
            // ->where('type','simple-product')
             ->where('created_at','>=',$current_date)
            ->orderBy('product_id', 'desc')
            // ->inRandomOrder()
            ->limit(4)
            ->get();

        // Women Category Product
        $category_product = DB::table('vw_product')
            // ->where('created_at','>=',$current_date)
            ->where('category_title', 'Women')
            ->where('type', 'simple-product')
            // ->orderBy('product_id','desc')
            ->inRandomOrder()
            ->limit(3)
            ->get();
        // Men Category Product
        $category_product_men = DB::table('vw_product')
            // ->where('created_at','>=',$current_date)
            ->where('category_title', 'Men')
            ->where('type', 'simple-product')
            // ->orderBy('product_id','desc')
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $logos = DB::table('brands as b')
            ->where('status', 'active')
            ->select('image_link')
            ->get()->toArray();

//        dd($logos);


        $admanager = DB::table('admanager')
            ->where('admanager.status', 'active')
            ->orderBy('ordering')
            // ->limit(50)
            ->get();

        Session::put('admanager_data', $admanager);


        $cms_list = DB::table('cms')
            ->where('cms.status', 'active')
            ->orderBy('ordering')
            // ->limit(50)
            ->get();
//        dd($cms_list);

        Session::put('cms_menu', $cms_list);

        // Page Title
        $pageTitle = "Askmebd Online Shopping in Bangladesh - askmebd.com is Online Shopping at Low price in Dhaka, Chittagong, Khulna, Sylhet , Mymensingh , Rajshahi and Barishal.";

        return view("Web::home.index", compact('slider_data', 'category_product','category_product_men','logos', 'trending_product', 'featured_product', 'custome_product', 'pageTitle'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function onsell()
    {


        // onsell Product
        $onsell_product = DB::table('vw_product')
            ->where('type', 'group-product')
            ->orderBy('product_id', 'desc')
            ->paginate(16);

        // Page Title
        $pageTitle = "Discount offer product";

        return view("Web::home.onsell", compact('onsell_product', 'pageTitle'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customise()
    {


        // onsell Product
        $custome_product = DB::table('vw_product')
            ->where('type', 'configurable-product')
            ->orderBy('product_id', 'desc')
            ->paginate(16);

        // Page Title
        $pageTitle = "Customise offer product";

        return view("Web::home.customise", compact('custome_product', 'pageTitle'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newarrivals()
    {

        $current_date = Carbon::today()->subDays(100);
        // onsell Product
        $new_arrivals = DB::table('vw_product')
            // ->where('type','simple-product')
            ->where('created_at', '>=', $current_date)
            ->orderBy('product_id', 'desc')
            // ->limit(16)
            // ->get();
            ->paginate(100);

        // Page Title
        $pageTitle = "New Arrivals Product";

        return view("Web::home.newarrivals", compact('new_arrivals', 'pageTitle'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function events()
    {


        // blogs
        $eventsData = DB::table('events')
            ->where('status', 'active')
            ->orderBy('short_order', 'desc')
            ->limit(10)
            ->get();

        // Page Title
        $pageTitle = "New & Events List";

        if (!empty($eventsData)) {

            return view("Web::event.events", compact('eventsData', 'pageTitle'));

        } else {
            return redirect()->route('/');;
        }


    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function events_details(Request $request)
    {


        $request['news_tag'] = $request->input('news_tag');
        // blogs Details data
        $eventsDetailsData = DB::table('events')
            ->where('status', 'active')
            //Blogs::where('blogs.id', $id)
            // ->select('blogs.*')
            // ->first();
            ->where('events.slug', $request->news_tag)
            ->get();


        // list data
        $eventsData = DB::table('events')
            ->where('status', 'active')
            ->orderBy('short_order', 'desc')
            ->limit(10)
            ->get();
        // Page Title
        // $pageTitle = "Events Details";  

        if (!empty($eventsDetailsData)) {

            $pageTitle = $request->news_tag;

            return view("Web::event.events_details", compact('eventsDetailsData', 'eventsData', 'pageTitle'));

        } else {
            return redirect()->route('/');;
        }


    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cmspage(Request $request)
    {

        $request['page_tag'] = $request->input('page_tag');
        $cms_list = DB::table('cms')
            ->where('status', 'active')
            ->where('cms.page_tag', $request->page_tag)
            ->get();

        if (!empty($cms_list)) {

            $pageTitle = $request->page_tag;

            return view('Web::home.cmspage', [
                'pageTitle' => $pageTitle,
                'cmsData' => $cms_list
            ]);

        } else {
            return redirect()->route('/');;
        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq()
    {


        $faq_list = DB::table('faq')
            ->where('status', 'active')
            ->orderBy('ordering')
            ->paginate(16);

        if (!empty($faq_list)) {
            $pageTitle = 'FAQ';

            return view('Web::home.faq', [
                'pageTitle' => $pageTitle,
                'faqData' => $faq_list
            ]);

        } else {
            return redirect()->route('/');;
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

}    
