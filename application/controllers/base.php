<?php

use Laravel\Asset;
use Laravel\Response;
use Laravel\Routing\Controller;
use Laravel\Session;

class Base_Controller extends Controller {
    public $layout = 'layout.bootstrap';
    public $user = null;

    public function __construct(){
        parent::__construct();
		$this->layout->title = 'NFA';
		//$this->layout->nest('menumain', 'layout.bootstrap');

        if( Session::has('user') ){
            $this->user = Session::get('user');
        }
        
		Asset::container('header')->add('bootstrap', 'css/bootstrap.min.css');
        Asset::container('header')->add('bootstrap-responsive', 'css/bootstrap-responsive.min.css');
        Asset::container('header')->add('bootswatch', 'css/bootswatch.css');

        Asset::container('footer')->add('smooth-scroll', 'js/jquery.smooth-scroll.min.js');
        Asset::container('footer')->add('bootstrap', 'js/bootstrap.min.js');
        Asset::container('footer')->add('bootswatch', 'js/bootswatch.js');
    }

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}