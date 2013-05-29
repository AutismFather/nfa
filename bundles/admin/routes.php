<?php

Route::controller(array(
    'admin::home',
    'admin::users',
    'admin::login',
	'admin::usergroups'
));

Route::filter('auth', function(){
    if (Auth::guest()) return Redirect::to(URL::to_action('admin::login'));
});