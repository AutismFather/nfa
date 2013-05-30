<?php
namespace Admin\Libraries;
use Laravel\Session, Laravel\Redirect;

class Notify {
	public static function set($status = 'error', $message = '', $url = ''){
		Session::flash('notification', $status);
		Session::flash('message', __('Admin::notifications.' . $message));

		if( !empty($url) ){
			return Redirect::to($url);
		}
	}
}