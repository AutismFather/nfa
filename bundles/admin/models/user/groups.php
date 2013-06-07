<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stuart
 * Date: 28/05/13
 * Time: 11:42 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Admin\Models;
use \Laravel\Database\Eloquent\Model as Eloquent;

class User_Groups extends Eloquent {
	public static $timestamps = true;

	/**
	 * User groups have many users
	 */
	public function users(){
		return $this->has_many('User');
	}
	/**
	 * Returns an array that can be used in a select/dropdown
	 * @return array|bool
	 */
	public static function getList(){
		$results = self::order_by('name')->get();
		$array = array();
		if( empty($results) ){
			return false;
		}
		foreach( $results as $row ){
			$array[$row->id] = $row->name;
		}
		return $array;
	}
}