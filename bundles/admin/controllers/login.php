<?php

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
        return View::make('admin::login.profi')->with('title', 'Login');
    }

    public function post_index(){

        $creds = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );

        if(\Laravel\Auth::attempt($creds, true)){
            return Redirect::to(URL::to_action('admin::home@index'));
        } else {
            return Redirect::back()->with('error', true);
        }

    }

    public function get_logout(){
        Auth::logout();
        return Redirect::to(URL::to_action('admin::home@index'));
    }

}