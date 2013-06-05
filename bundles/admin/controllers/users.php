<?php
use \Admin\Models\User\Groups;
use \Admin\Models\User;
use Laravel\URL;

/**
 * Class Admin_Users_Controller
 */
class Admin_Users_Controller extends Admin_Base_Controller {

	public function __construct(){
		parent::__construct();

		// Create tabs for this page
		$this->tabs(array(
			array(__('Admin::title.users'), URL::to_action('admin@users')),
			array(__('Admin::title.add'), URL::to_action('admin@users@add')),
			array(__('Admin::title.usergroups'), URL::to_action('admin@usergroups'))
		));
	}
	/**
	 * Admin/Users::get_index()
	 * Returns the main index - list of users
	 */
	public function get_index(){
		// retrieve list of users
        $userList = User::order_by('username')->get();

		// Set title and show user list
		$this->layout->title = __('Admin::title.users');
		$this->layout->nest('content', 'admin::users.index', array(
			'userList' => $userList
		));
    }


	/**
	 * Display the add users form
	 * @return mixed
	 */
	public function get_add(){
		// Get list of user groups
		$groups = \Admin\Models\User_Groups::getList();
		if( empty($groups) ){
			return \Admin\Libraries\Notify::set('error', 'groupsrequired', URL::to_action('admin@usergroups@add'));
		}

		$this->layout->title = __('Admin::title.adduser');
        $this->layout->nest('content', 'admin::users.add', array(
			'groups' => $groups
		));
    }

	public function get_edit($id = 0){
		// If the person has not entered an id for some reason, redirect back
		if( empty($id) ){
			return \Admin\Libraries\Notify::set('error', 'invalidid', URL::to_action('admin@users'));
		}
		// retrieve database record
		$user = User::find($id);

		// Get the user group list
		$groups = \Admin\Models\User_Groups::getList();

		// if there was no user found in the db with that id, redirect back
		if( empty($user) ){
			return \Admin\Libraries\Notify::set('error', 'nouserfound', URL::to_action('admin@users'));
		}

		// Display template
		$this->layout->title = __('Admin::title.edituser', array('name' => $user->username));
		$this->layout->nest('content', 'admin::users.edit', array(
			'user' => $user,
			'groups' => $groups
		));
	}


	public function get_details($id = 0){
		if( empty($id) ){
			Session::flash('error', 'Invalid ID');
			return Redirect::to('/admin/users');
		}

		$user = User::find($id);

		if( empty($user) ){
			Session::flash('error', 'User not found');
			return Redirect::to('/admin/users');
		}

		$this->layout->title = 'User details: ' . $user->username;
		$this->layout->nest('content', 'admin::users.details', array(
			'user' => $user
		));
	}
}