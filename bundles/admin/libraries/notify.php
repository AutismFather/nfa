<?php
namespace Admin\Libraries;
use Laravel\Lang;
use Laravel\Session, Laravel\Redirect;

class Notify {
	public static function set($status = 'error', $message = '', $url = ''){
		Session::flash('notification', $status);
		// Ensure notifications language file has a reference. if not, pass the message directly
		if( Lang::has('Admin::notifications.' . $message) ){
			$message = __('Admin::notifications.' . $message);
		}
		// Set message to session flash
		Session::flash('message', $message);

		// If URL is passed, redirect to it
		if( !empty($url) ){
			return Redirect::to($url);
		}
	}
}