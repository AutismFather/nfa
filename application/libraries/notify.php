<?php
use Laravel\Lang;
use Laravel\Session, Laravel\Redirect;

class Notify {
	public static function set($status = 'error', $message = '', $url = ''){
		$vars = null;

        // Set the notification type/status first
		Session::flash('notification', $status);

		// Message may be an array, if there are any variables to be replaced in the string
		if( is_array($message) ){
			$vars = $message[1];
			$message = $message[0];
		}

    	// Ensure notifications language file has a reference. if not, pass the message directly
		if( Lang::has('notifications.' . $message) ){
			$message = __('notifications.' . $message, $vars);
		}

    	// Set message to session flash
		Session::flash('message', $message);

		// If URL is passed, redirect to it
		if( !empty($url) ){
			return Redirect::to($url);
		}
	}
}