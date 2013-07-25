<?php

use \Laravel\Database\Eloquent\Model as Eloquent;

class Cart extends Eloquent {
    public function cartitems(){
        return $this->has_many('cartitems');
    }

    /**
     * Returns true or false depending on if a user has an existing cart
     * 
     * @param type $user_id
     * @return boolean
     */

    public static function exists($user_id = 0){
        $cart = self::where('user_id', '=', $user_id)->first();
        if( empty($cart) ){
            return false;
        }
        return true;
    }

    public static function create($user_id = 0){
        return self::insert(array('user_id' => $user_id));
    }

    public static function getCart($user_id = 0){
        return self::where('user_id', '=', $user_id)
               ->first();
    }

    public static function updateTotal($user_id = 0){
        $items = Cartitems::where('user_id', '=', $user_id)->get();
        $total = 0;
        foreach( $items as $item ){
            $total += $item->price * $item->quantity;
        }

        self::where('user_id', '=', $user_id)->update(array('total' => $total));
        return $total;
    }
    
}
?>