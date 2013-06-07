<?php
namespace Admin\Models;
use \Laravel\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent{
	public static $timestamps = true;

	public function products(){
		return $this->has_one_or_many('Product');
	}

	public static function getList(){
		$result = self::order_by('name')->get();
		if( empty($result) ){ return false; }

		$categories = array();
		foreach( $result as $row ){
			$categories[$row->id] = $row->name;
		}
		return $categories;
	}
}