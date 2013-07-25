<?php
use Laravel\Auth\Drivers\Eloquent;

class Cartitems extends Eloquent {
    public function cart(){
        return $this->belongs_to('Cart', 'cart_id');
    }

    public static function remove($id = 0){
        if( empty($id) ){
            return false;
        }

        return self::delete($id);
    }
}
?>