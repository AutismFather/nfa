<?php

namespace Admin\Models;
use \Laravel\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {

	public static $timestamps = true;

	public function user_group(){
		return $this->belongs_to('Admin\Models\User_Groups', 'user_groups_id');
	}

    public static function search($array = null){
        $where = 'where';
        $values = array();
        $count = 0;
        foreach( $array as $field => $value ){
            if( $count > 0 ){
                $where.= '_and';
            }
            $where.= '_'.$field;
            $values[] = $value;
            $count++;
        }
        $result = self::where_username_or_email('StuartD', 'stuart')->first();
        return $result;
    }
}