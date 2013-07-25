<?php
use \Laravel\Database\Eloquent\Model as Eloquent;

class Cartitems extends Eloquent {
    public function cart(){
        return $this->belongs_to('Cart', 'cart_id');
    }

    public function products(){
        return $this->belongs_to('Product', 'product_id');
    }

    /**
     * Adds an item in the database
     * 
     * @param type $user_id
     * @param type $cart_id
     * @param type $product_id
     * @param type $price
     * @param type $quantity
     */
    public static function add($user_id, $cart_id, $product_id, $price = 0, $quantity = 1){
        return self::insert(array(
            'user_id' => $user_id,
            'cart_id' => $cart_id,
            'product_id' => $product_id,
            'price' => $price,
            'quantity' => $quantity
        ));
    }

    /**
     * Checks to see if a user has a product already in the database.
     * If no, return false.
     * If yes, returns the quantity number
     * 
     * @param type $user_id
     * @param type $product_id
     * @return boolean
     */
    public static function checkExisting($user_id = 0, $product_id = 0){
        // Check to see if a user already has this product in their cart
        $exists = self::where('user_id', '=', $user_id)->where('product_id', '=', $product_id)->first();

        if( empty($exists) ){
            return false;
        }

        // return the quantity in the cart
        return $exists->quantity;
    }

    /**
     * Updates the quantity value for a user's product listing in the database
     * 
     * @param type $user_id
     * @param type $product_id
     * @param type $quantity
     * @return type
     */
    public static function setQuantity($user_id = 0, $product_id = 0, $quantity = 1){
        return self::where('user_id', '=', $user_id)->where('product_id', '=', $product_id)->update(array('quantity' => $quantity));
    }

    public static function remove($id = 0){
        if( empty($id) ){
            return false;
        }

        return self::where('id', '=', $id)->delete();
    }
}
?>