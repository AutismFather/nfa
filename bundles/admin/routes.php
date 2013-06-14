<?php

Route::controller(array(
    'admin::home',
    'admin::users',
    'admin::login',
	'admin::usergroups',
	'admin::categories',
	'admin::products'
));

Route::filter('before', function()
{
    if ( ! Auth::check() && ! URI::is('login'))
    {
        //return Redirect::to_secure('login', 307);
        return Laravel\Redirect::to(\Laravel\URL::to_action('admin@login'));
    }
});