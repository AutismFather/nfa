<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stuart
 * Date: 22/05/13
 * Time: 9:45 AM
 * To change this template use File | Settings | File Templates.
 */
class Admin_Base_Controller extends Controller {
    public $restful = true;
    public $layout = 'admin::layouts.main';

    public function __construct(){

        parent::__construct();

        Asset::container('header')->bundle('admin');

        Asset::container('footer')->bundle('admin');
        Asset::container('footer')->add('jquery', 'http://code.jquery.com/jquery-latest.min.js');
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