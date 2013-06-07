<?php

Route::controller(array(
    'admin::home',
    'admin::users',
    'admin::login',
	'admin::usergroups',
	'admin::categories',
	'admin::products'
));

Route::filter('auth', function(){
    if (Auth::guest()) return Redirect::to(URL::to_action('admin::login'));
});