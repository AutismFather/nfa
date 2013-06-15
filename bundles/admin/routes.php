<?php

use Laravel\Auth;
use Laravel\Redirect;
use Laravel\Routing\Route;
use Laravel\URI;
use Laravel\URL;

Route::controller(array(
    'admin::home',
    'admin::users',
    'admin::login',
	'admin::usergroups',
	'admin::categories',
	'admin::products'
));

Route::any('(:bundle)/logout', function() {
    Auth::logout();
    return Redirect::to(URL::to_action('admin@login'));
});


Route::filter('before', function()
{
    if ( ! Auth::check() && ! URI::is('login'))
    {
        //return Redirect::to_secure('login', 307);
        return Redirect::to(URL::to_action('admin@login'));
    }
});