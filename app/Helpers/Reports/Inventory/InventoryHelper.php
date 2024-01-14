<?php 
    namespace App\Helpers\Reports\Inventory;
    use DB;

    class InventoryHelper
    {
        static public function productName($id)
        {
            $result = DB::table('product')->select('title')
                        ->where('id',$id)->get(); 
            foreach($result as $value){
                return($value->title);
            }
        }

      

        static public function productNameBn($id)
        {
            $result = DB::table('product')->select('title_bn')
                        ->where('id',$id)->get(); 
                foreach($result as $value){
                    return($value->title_bn);
                }
        }

        static public function productNameHi($id)
        {
            $result = DB::table('product')->select('title_hi')
                        ->where('id',$id)->get(); 
            foreach($result as $value){
                return($value->title_hi);
            }
        }

        static public function productNameCh($id)
        {
            $result = DB::table('product')->select('title_ch')
                        ->where('id',$id)->get(); 
            foreach($result as $value){
                return($value->title_ch);
            }
        }


        static public function shopName($id)
        {
            $result = DB::table('seller_profiles')->select('shop_name')
                        ->where('users_id',$id)->get(); 
            foreach($result as $value){
                return($value->shop_name);
            }
        }

        static public function catName($id)
        {
             $result = DB::table('category')->select('title')
                        ->where('id',$id)->get(); 
            foreach($result as $value){
                return($value->title);
            }          
        }

        static public function brandName($id)
        {
            $result = DB::table('brands')->select('title')
                        ->where('id',$id)->get(); 

            if($result){
                foreach($result as $value){
                    return $value->title??'Not defined';
                }

            }else{
                return 'Not defined';
            }
        }


        

        static public function pendingProductCount($parm)
        {
            return $result = DB::table('product')
            			->where('seller_id',$parm)
            			->where('status','inactive')
            			->count();           
        }

        static public function stockOutProduct($parm)
        {
            return $result = DB::table('product')
            			->where('seller_id',$parm)
            			->where('status','inactive')
            			->count();           
        }

        static public function pendingOrderCount($parm)
        {
            return $result = DB::table('product')
            			->where('seller_id',$parm)
            			->where('status','inactive')
            			->count();           
        }



    }
