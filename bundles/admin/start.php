<?php
Autoloader::map(array(
    'Admin_Base_Controller' => Bundle::path('admin').'controllers/base.php',
    'Admin_Users_Controller' => Bundle::path('admin').'controllers/users.php',
	'Admin_Usergroups_Controller' => Bundle::path('admin').'controllers/usergroups.php'
));

Autoloader::namespaces(array(
    'Admin\Models' => Bundle::path('admin').'models',
    'Admin\Libraries' => Bundle::path('admin').'libraries',
));

Autoloader::directories(array(
    Bundle::path('admin').'models',
    Bundle::path('admin').'libraries',
	Bundle::path('admin').'controllers'
));

Auth::extend('adminauth', function(){
    return new Admin\Libraries\AdminAuth;
});