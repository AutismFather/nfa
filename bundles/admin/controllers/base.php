<?php

use Laravel\Asset;
use Laravel\Auth;
use Laravel\Config;
use Laravel\Redirect;
use Laravel\Routing\Controller;
use Laravel\URL;
/**
 * Created by JetBrains PhpStorm.
 * User: Stuart
 * Date: 22/05/13
 * Time: 9:45 AM
 * To change this template use File | Settings | File Templates.
 */
class Admin_Base_Controller extends Controller {
    public $restful = true;
    public $layout = 'admin::layouts.profi';

    public function __construct(){

        parent::__construct();
		$this->layout->title = 'NFA';
		$this->layout->nest('menumain', 'admin::layouts.menumain');

		Asset::container('header')->add('960', 'css/960.css');
		Asset::container('header')->add('reset', 'css/reset.css');
		Asset::container('header')->add('text', 'css/text.css');
		Asset::container('header')->add('blue', 'css/blue.css');
		Asset::container('header')->add('smoothness', 'css/smoothness/ui.css');
		Asset::container('header')->add('datatables', 'css/jquery.dataTables.css');

        Asset::container('header')->add('jquery', 'http://code.jquery.com/jquery-latest.min.js');
		Asset::container('header')->add('blend', 'js/blend/jquery.blend.js');
		Asset::container('header')->add('core', 'js/ui.core.js');
		Asset::container('header')->add('sortable', 'js/ui.sortable.js');
		Asset::container('header')->add('dialog', 'js/ui.dialog.js');
		Asset::container('header')->add('datepicker', 'js/ui.datepicker.js');
		Asset::container('header')->add('effects', 'js/effects.js');
		Asset::container('header')->add('flot', 'js/flot/jquery.flot.pack.js');
		Asset::container('header')->add('excanvas', 'js/flot/excanvas.pack.js');

		// Display notification if there is one.
		if( Session::has('notification') ){
			$this->layout->nest('notification', 'admin::layouts.notification', array(
				'status' => Session::get('notification'),
				'message' => Session::get('message')
			));
		}

        // Default section setting for the main menu
        $this->setSection('dashboard');
    }

    /**
     * Admin/Base::tabs()
     * 
     * @param type $array
     */
	public function tabs($array = null){
		$this->layout->nest('tabs', 'admin::layouts.tabs', array(
			'tabs' => $array
		));
	}

    public function setSection($x = ''){
        $sections = Config::get('admin::sections');
        $sectionArray = array();
        foreach( $sections as $key => $section ){
            if( $x == $key ){
                $section[$key]['current'] = true;
            }
            $sectionArray[] = $section;
        }

        $this->layout->share('sections', $sectionArray);
     }
  
    /**
     * Catch-all method for requests that can't be matched.
     *
     * @param  string    $method
     * @param  array     $parameters
     * @return Response
     */
    public function __call($method, $parameters){
        return Response::error('404');
    }
}