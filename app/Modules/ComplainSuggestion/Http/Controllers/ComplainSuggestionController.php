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

class ComplainSuggestionController extends Controller
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
        $pageTitle = "Complain or Suggestion";

        // Get brand data
        $data = ComplainSuggestion:: select('complain_suggestion.*')
                ->whereNull('created_for')
                ->whereNull('deleted_at')
                ->orderBy('id','DESC')
                ->paginate(30);
        // return view
        return view("ComplainSuggestion::complainsuggestion.index", compact('data','pageTitle'));

    }


    public function indexNotice()
    {
        $pageTitle = "Notice";

        $data = ComplainSuggestion::select('complain_suggestion.*');
        
        $data = $data->where(function($data){
                    return $data->whereNotNull('created_for')
                                ->orWhere('notice_for_all','yes');

                });
        $data = $data->whereNull('deleted_at')
                ->orderBy('id','DESC')
                ->paginate(20);


        // return view
        return view("ComplainSuggestion::complainsuggestion.indexNotice", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Notice";
        $sellerList = Seller::sellerListForCommonNotice(); 

        // return View
        return view("ComplainSuggestion::complainsuggestion.create", compact('sellerList','pageTitle'));
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
        $sellerId = $request->created_for;
        // Get all input data
        $input = $request->all();

        if( $sellerId != 'all'){
            $user = User::find($sellerId);

            $input['created_for'] = (int)$sellerId;
            $input['mail'] = $user->email ?? null;
            $input['phone_no'] = $user->mobile_no ?? null;
            $input['notice_for_all'] = 'no';
        }else{
            $input['created_for'] = null;
            $input['mail'] = null;
            $input['phone_no'] = null;
            $input['notice_for_all'] = 'yes';
        }

        $input['created_by'] = Auth::user()->id;
        $input['created_from'] = 1;
        $input['admin_status'] = 2;
        $input['user_status'] = 1;

        try {
            //dd($input);
            // Store ComplainSuggestion data
            ComplainSuggestion::create($input);
            
            Session::flash('message', 'successfully added');
            
            return redirect('admin-notice-index');

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();

    }

 
    public function show($id)
    {

        $pageTitle = 'Notice / Complain or Suggestion';

        $model = ComplainSuggestion::find($id);

        if($model->admin_status == 1){
            $readed['admin_status'] = 2;
            $result = $model->update($readed);
        }

        // Find brand data
        $data = ComplainSuggestion::where('complain_suggestion.id', $id)
            ->select('complain_suggestion.*')
            ->first();

        if(!empty($data))
        {
            // If found brand
            return view("ComplainSuggestion::complainsuggestion.show", compact('data','pageTitle'));

        }else{
            // If brand not found
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
        $pageTitle = "Notice";

        $sellerList = Seller::sellerListForCommonNotice(); 

        // Find ComplainSuggestion
        $data = ComplainSuggestion::where('complain_suggestion.id', $id)
            ->select('complain_suggestion.*')
            ->first();

        // If ComplainSuggestion not found
        if(empty($data)){
            Session::flash('danger', 'somplainsuggestion not found.');
            return redirect()->route('admin.somplainsuggestion.index');
        }

        return view("ComplainSuggestion::complainsuggestion.edit", compact('data','sellerList','pageTitle'));

    }



    public function createAnswer($id)
    {
        $pageTitle = "Create Answer";

        $sellerList = Seller::sellerList(); 

        // Find ComplainSuggestion
        $data = ComplainSuggestion::where('complain_suggestion.id', $id)
            ->select('complain_suggestion.*')
            ->first();

        // If ComplainSuggestion not found
        if(empty($data)){
            Session::flash('danger', 'somplainsuggestion not found.');
            return redirect()->route('admin.complain.suggestion.index');
        }

        return view("ComplainSuggestion::complainsuggestion.answer", compact('data','sellerList','pageTitle'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ComplainSuggestionRequest $request, $id)
    {

        // Find ComplainSuggestion
        $model = ComplainSuggestion::where('complain_suggestion.id', $id)
            ->select('complain_suggestion.*')
            ->first();


        if( $request->created_for != 'all'){
            $user = User::find($request->created_for);
            $input['created_for'] = (int)$request->created_for;
            $input['mail'] = $user->email ?? null;
            $input['phone_no'] = $user->mobile_no ?? null;
            $input['notice_for_all'] = 'no';
        }else{
            $input['created_for'] = null;
            $input['mail']          = null;
            $input['phone_no']      = null;
            $input['notice_for_all'] = 'yes';
        }

        $input['title']         = $request->title??$model->title;        
        $input['com_sugg_desc'] = $request->com_sugg_desc??$model->com_sugg_desc;
        $input['reply']         = $request->reply??$model->reply;
        $input['admin_status']  = $request->admin_status??$model->admin_status;
        $input['user_status']   = $request->user_status??$model->user_status;
        $input['user_status']   = 1;
        $input['created_for']   = $request->created_for??$model->created_for;
        $input['created_by']    = $request->created_by??$model->created_by;
        $input['deleted_by']    = $request->deleted_by??$model->deleted_by;
        $input['replied_by']    = $request->replied_by??$model->replied_by;
        $input['deleted_at']    = $request->deleted_at??$model->deleted_at;
        $input['updated_at']    = now();

        try {
            // Update ComplainSuggestion
            $result = $model->update($input);

            Session::flash('message', 'Successfully updated!');
            
            if($model->created_for){
                return redirect('admin-notice-index');
            }else{
                return redirect('admin-complain-suggestion-index');

            }
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
        // Find ComplainSuggestion

        $model = ComplainSuggestion::where('complain_suggestion.id', $id)
            ->select('complain_suggestion.*')
            ->first();

        DB::beginTransaction();
        try {
            // ComplainSuggestion update
            if($model->deleted_at == null ){
                $model->deleted_at = now();
                $model->deleted_by = Auth::user()->id;
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
        $model = new ComplainSuggestion();

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->search_keywords);
            $model = $model->where(function ($query) use($search_keywords){
                $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
            });
            $data = $model->select('complain_suggestion.*')->paginate(30);
        }else{
            // If get data not found
            $data = ComplainSuggestion::select('complain_suggestion.*')
                ->paginate(30);
        }
        // Return view
        return view("ComplainSuggestion::complainsuggestion.index", compact('data','pageTitle'));


    }


}
