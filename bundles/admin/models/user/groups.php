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
	public static function getList(){
		return self::order_by('name')->get();
	}
}