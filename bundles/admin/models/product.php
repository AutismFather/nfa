<?php
namespace Admin\Models;
use Admin\Models\Category;
use \Laravel\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent {
	public function option(){
		return $this->has_many('Option');
	}

	public function category(){
		return $this->belongs_to('Admin\Models\Category');
	}
}