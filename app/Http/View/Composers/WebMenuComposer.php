<?php
namespace App\Http\View\Composers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Session;
use App\Modules\Category\Models\Category;
use App\Modules\Admin\Models\Menu;


class WebMenuComposer{

    public function compose(){
       
       if(Session::has('main_menu')){

            // do nothing

        }else{

            $category_model = Category::getWebMenu();

            Session::put('main_menu',$category_model);

        }

        $category_model = Category::getWebMenu();
        Session::put('main_menu',$category_model);

    }

}
