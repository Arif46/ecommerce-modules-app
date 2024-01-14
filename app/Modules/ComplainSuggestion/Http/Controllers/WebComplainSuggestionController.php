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

class WebComplainSuggestionController extends Controller
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


 
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Create a New Suggestion";
        $sellerList = Seller::sellerList(); 

        // return View
        return view("ComplainSuggestion::webcomplainsuggestion.create", compact('sellerList','pageTitle'));
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
        $input['created_from'] = 3;
        $input['created_by'] = $sellerId;
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

 







}
