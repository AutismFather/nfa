<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stuart
 * Date: 22/05/13
 * Time: 9:40 AM
 * To change this template use File | Settings | File Templates.
 */
Autoloader::map(array(
    'Admin_Base_Controller' => Bundle::path('admin').'controllers/base.php',
));

Autoloader::namespaces(array(
    'Admin\Models' => Bundle::path('admin').'models',
    'Admin\Libraries' => Bundle::path('admin').'libraries',
));

Auth::extend('adminauth', function(){
    return new Admin\Libraries\AdminAuth;
});