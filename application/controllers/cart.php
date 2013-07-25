<?php

use Laravel\URL;

class Cart_Controller extends Base_Controller {
    public function action_index(){

        $cart = Cart::where('user_id', '=', $this->user->id)->first();

        // Retrieve all items in the cart for this user
        $items = Cartitems::with('products')->where('user_id', '=', $this->user->id)->get();

        $this->layout->title = 'Cart';
        $this->layout->nest('content', 'cart.index', array(
            'cart' => $cart,
            'items' => $items
        ));
    }

    public function action_add($id = 0){
        // If no product passed or not a number
        if( empty($id) || !is_numeric($id) ){
            return Notify::set('error', 'Product not found', URL::to_action('cart'));
        }

        // Create cart if not existing
        if( Cart::exists($this->user->id) == false ){
            $cart_id = Cart::create($this->user->id);
        }
        else {
            $cart = Cart::getCart($this->user->id);
            $cart_id = $cart->id;
        }

        // Get product
        $product = Product::find($id);
        if( empty($product) ){
            return Notify::set('error', 'Product not found', URL::to_action('cart'));
        }

        // Check to see if the user already has this product in their cart.
        // If so, it returns the quantity in there.
        $existing = Cartitems::checkExisting($this->user->id, $id);
        // If not in there, update the quantity + 1 and update the cart.
        if( $existing != false ){
            Cartitems::setQuantity($this->user->id, $id, $existing + 1);
            Cart::updateTotal($this->user->id);
            return Notify::set('success', 'Product added to cart', URL::to_action('cart'));
        }

        // If made it here, add the item to the cart
        Cartitems::add(
            $this->user->id,
            $cart_id,
            $id,
            $product->price,
            1
        );
        Cart::updateTotal($this->user->id);

        return Notify::set('success', 'Successfully added product to cart', URL::to_action('cart'));
    }

    public function action_remove($id = ''){
        if( Cartitems::remove($id) == false ){
            return Notify::set('error', 'Unable to remove item', URL::to_action('cart'));
        }

        Cart::updateTotal($this->user->id);
        return Notify::set('success', 'Item removed from cart', URL::to_action('cart'));
    }

    public function action_update($id = ''){
        $quantity = Input::get('quantity', 0);

        if( $quantity == 0 ){
            // If 0, just remove the item from the database.
            Cartitems::where('user_id', '=', $this->user->id)->where('id', '=', $id)->delete();
            Cart::updateTotal($this->user->id);
            return Notify::set('success', 'Item removed from cart', URL::to_action('cart'));
        }

        Cartitems::where('user_id', '=', $this->user->id)->where('id', '=', $id)->update(array('quantity' => $quantity));
        Cart::updateTotal($this->user->id);
        return Notify::set('success', 'Product quantity successfully updated', URL::to_action('cart'));
    }
    
}
?>
