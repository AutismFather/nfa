<?php

use Laravel\Auth\Drivers\Eloquent;

class Cart extends Eloquent {
    public function cartitems(){
        $this->has_many('Cartitems');
    }

    
    
    public function create($user_id = 0){
        return self::insertGetId(array('user_id' => $user_id));
    }
}
?>