<?php

class Cart_Controller extends Base_Controller {
    public function action_remove($id = ''){
        Cartitems::remove($id);
        Notify::set('success', 'Item removed from cart', Laravel\URL::to_action('cart'));
    }
}
?>
