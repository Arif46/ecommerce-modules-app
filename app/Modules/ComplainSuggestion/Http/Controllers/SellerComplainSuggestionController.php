<?php

namespace App\Modules\ComplainSuggestion\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\ComplainSuggestion\Requests;
use App\Modules\ComplainSuggestion\Models\ComplainSuggestion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Modules\Seller\Models\Seller;
use App\User;
use Illuminate\Support\Facades\Auth;

class SellerComplainSuggestionController extends Controller
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

   
    public function __construct()
    {
        //
    }


 
    public function index()
    {
        $pageTitle = "Notice";
        $userId = Auth::user()->id;

        //dd($userId);

        $verifaid_user =User::join('seller_profiles','users.id','=','seller_profiles.users_id')
        ->where('users.id',$userId)
        ->select('users.email', 'users.id','seller_profiles.shop_name')
        ->first();

        $data = ComplainSuggestion::select('complain_suggestion.*');
        
        $data = $data->where(function($data) use($userId) {
                    return $data->where('created_for', $userId)
                                ->orWhere('notice_for_all','yes');

                });
        $data = $data->whereNull('deleted_at')
                ->orderBy('id','DESC')
                ->paginate(20);
        // return view
        return view("ComplainSuggestion::sellercomplainsuggestion.index", compact('data','pageTitle','verifaid_user'));

    }


   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Create a complain or suggestion";

        // return View
        return view("ComplainSuggestion::sellercomplainsuggestion.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ComplainSuggestionRequest $request)
    {
        //Use for seller complaine
        $sellerId = Auth::user()->id;
        $user = User::find($sellerId);
        // Get all input data
        $input = $request->all();
        $input['mail'] = $request->mail ?? $user->email;
        $input['phone_no'] = $request->phone_no ?? $user->mobile_no;
        $input['created_by'] = Auth::user()->id;
        $input['created_from'] = 2;
        $input['admin_status'] = 1;
        $input['user_status'] = 2;

        try {

            // Store ComplainSuggestion data
            ComplainSuggestion::create($input);
            
            Session::flash('message', 'Successfully added a complain/suggestion');
            
            return redirect()->back();

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();

    }

 
    public function show($id)
    {

        $pageTitle = 'Notice';

        $userId = Auth::user()->id;

        $model = ComplainSuggestion::where('id',$id)
                                    ->whereNull('deleted_at');
        $model = $model->where(function($model) use($userId) {
                    return $model->orWhere('created_for', $userId)
                                ->orWhere('created_by',$userId);

                });
        $model = $model->first();

        // Find brand data
        if(!empty($model))
        {
            if($model->user_status == 1){
                $readed['user_status'] = 2;
                $result = $model->update($readed);
            }

            $data = $model;
            // If found brand
            return view("ComplainSuggestion::sellercomplainsuggestion.show", compact('data','pageTitle'));

        }else{
            // If brand not found
            return redirect()->back();
        }
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $pageTitle = 'Notice';

        $userId = Auth::user()->id;

        $verifaid_user =User::join('seller_profiles','users.id','=','seller_profiles.users_id')
        ->where('users.id',$userId)
        ->select('users.email', 'users.id','seller_profiles.shop_name')
        ->first();

        $model = ComplainSuggestion::select('complain_suggestion.*');
        
        $model = $model->where(function($data) use($userId) {
                    return $data->where('created_for', $userId)
                                ->orWhere('notice_for_all','yes');

                });       

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->search_keywords);

            $model = $model->where(function ($query) use($search_keywords){
                return $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%')
                ->orWhere('com_sugg_desc', 'LIKE', '%'.$search_keywords.'%');
            });
            $data = $model->paginate(30);
        }else{
            // If get data not found
            $data = $model->paginate(30);
        }
        // Return view
        return view("ComplainSuggestion::sellercomplainsuggestion.index", compact('data','pageTitle','verifaid_user'));

    }

}
