<?php

namespace App\Modules\SellerControl\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerControlController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("SellerControl::welcome");
    }
}
