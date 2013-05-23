<?php
Autoloader::map(array(
    'Admin_Base_Controller' => Bundle::path('admin').'controllers/base.php',
    'Admin_Users_Controller' => Bundle::path('admin').'controllers/users.php'
));

Autoloader::namespaces(array(
    'Admin\Models' => Bundle::path('admin').'models',
    'Admin\Libraries' => Bundle::path('admin').'libraries',
));

Autoloader::directories(array(
    Bundle::path('admin').'models',
    Bundle::path('admin').'libraries',
));

Auth::extend('adminauth', function(){
    return new Admin\Libraries\AdminAuth;
});