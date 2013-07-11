<?php

use \Laravel\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent {

    /**
     * Product::getList($category_id = 0, $sort = 'price', $order = 'asc', $limit = 20, $page = 1)
     * Retrieves a list of products
     * 
     * @param type $category_id
     * @param type $sort
     * @param type $order
     * @param type $limit
     * @param type $page
     * @return type
     */
    public static function getList($category_id = 0, $sort = 'price', $order = 'asc', $limit = 20, $page = 1){
        $table = DB::table('products');
        if( !empty($category_id) ){
            $table->where('category_id', '=', $category_id);
        }

        if( !empty($limit) ){
            if( $page == 1 ){ $offset = 0; }
            else { $offset = $page * $limit - $limit; }

            $table->take($limit)->skip($offset);
        }

        $table->order_by($sort, $order);
        
        return $table->get();
    }
}