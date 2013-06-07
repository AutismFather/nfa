<?php
namespace Admin\Models;
use \Laravel\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent {
	public function option(){
		return $this->has_many('Option');
	}
}