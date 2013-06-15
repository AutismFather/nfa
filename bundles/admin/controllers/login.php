<?php

use Laravel\Asset;
use Laravel\Auth;
use Laravel\Config;
use Laravel\Redirect;
use Laravel\URL;
use Laravel\View;

class Admin_Login_Controller extends Admin_Base_Controller {
      
    public function __construct(){

        parent::__construct();

        Config::set('auth.driver', 'adminauth');

    	//$assets = Asset::container('header')->bundle('admin');
		Asset::container('header')->add('960', 'css/960.css');
		Asset::container('header')->add('reset', 'css/reset.css');
		Asset::container('header')->add('text', 'css/text.css');
		Asset::container('header')->add('login', 'css/login.css');
        //Asset::container('header')->add('bootstrap', 'css/bootstrap.min.css');

    }

    public function get_index(){
        $title = __('admin::title.login');
        return View::make('admin::login.profi')->with('title', $title);
    }

    public function post_index(){

        $creds = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );

        // Remember me box?
        $rememberme = Input::get('rememberme', false);

        if(Auth::attempt($creds, $rememberme) != false ){
            return Redirect::to(URL::to_action('admin@home@index'));
        } else {
            return Redirect::back()->with('error', true);
        }

    }

    public function get_logout(){
        Auth::logout();
        return Redirect::to(URL::to_action('admin::home@index'));
    }

}